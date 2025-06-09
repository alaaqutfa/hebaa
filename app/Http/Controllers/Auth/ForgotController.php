<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ForgotController
{
    public function getForgot()
    {
        return view("auth.forgot");
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email is required.',
            'email.email'    => 'Please enter a valid email address.',
            'email.exists'   => 'This email is not registered.',
        ]);

        $otp   = rand(100000, 999999);
        $email = $request->email;

        // خزن الـ OTP في الكاش لمدة 30 دقيقة
        Cache::put("otp_$email", $otp, now()->addMinutes(30));

        // إرسال الإيميل
        Mail::to($email)->send(new \App\Mail\SendOtpMail($otp));

        return redirect()->route('auth.get.verify')->with('email', $email);
    }

    public function getVerify(Request $request)
    {
        $email = session('email');

        if (! $email) {
            return redirect()->route('auth.get.forgot')->withErrors(['error' => 'Please enter your email first.']);
        }

        return view("auth.verify", compact('email'));
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp'   => 'required|numeric',
        ]);

        $email      = $request->email;
        $enteredOtp = $request->otp;
        $cachedOtp  = Cache::get("otp_$email");

        if (! $cachedOtp || $cachedOtp != $enteredOtp) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        Cache::put("allow_reset_$email", true, now()->addMinutes(30));

        // توجيه المستخدم لصفحة إعادة تعيين كلمة السر مثلاً
        return redirect()->route('auth.get.reset', ['email' => $email]);
    }

    public function getReset(Request $request)
    {
        $email = $request->query('email');

        if (! $email || ! Cache::get("allow_reset_$email")) {
            return redirect()->route('auth.get.forgot')
                ->withErrors(['email' => 'Please enter your email first.']);
        }

        return view('auth.reset', compact('email'));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.required'     => 'Email is required.',
            'email.email'        => 'Please enter a valid email address.',
            'email.exists'       => 'This email is not registered.',
            'password.required'  => 'Password is required.',
            'password.min'       => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        $user = User::where('email', $request->email)->first();

        $user->password = Hash::make($request->password);
        $user->save();

        // حذف العلم المؤقت للسماح بإعادة التعيين
        Cache::forget("allow_reset_{$request->email}");

        return redirect()->route('auth.get.login')->with('message', 'Password has been reset successfully.');
    }
}
