<?php
namespace App\Http\Controllers\Auth;

use App\Models\PendingUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class RegisterController
{
    public function getRegister()
    {
        return view("auth.register");
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'nullable|string|max:255',
            'password'  => 'required|confirmed|min:6',
            'privacy'   => 'accepted',
        ], [
            'name.required'      => 'Name is required.',
            'name.string'        => 'Name must be a valid string.',
            'name.max'           => 'Name must not exceed 255 characters.',

            'last_name.string'   => 'Last name must be a valid string.',
            'last_name.max'      => 'Last name must not exceed 255 characters.',

            'email.required'     => 'Email is required.',
            'email.email'        => 'Please enter a valid email address.',
            'email.unique'       => 'This email is already registered.',

            'phone.string'       => 'Phone number must be a valid string.',
            'phone.max'          => 'Phone number must not exceed 255 characters.',

            'password.required'  => 'Password is required.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min'       => 'Password must be at least 6 characters long.',

            'privacy.accepted'   => 'You must accept the privacy policy.',
        ]);

        $token = Str::random(64);

        $pending = PendingUser::create([
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => Hash::make($request->password),
            'token'     => $token,
        ]);

        Mail::to($request->email)->send(new \App\Mail\VerifyEmail($pending));

        return back()->with('message', 'Please check your email to confirm your registration.');
    }

    public function verifyEmail($token)
    {
        $pending = PendingUser::where('token', $token)->firstOrFail();

        $user = User::create([
            'name'      => $pending->name,
            'last_name' => $pending->last_name,
            'email'     => $pending->email,
            'phone'     => $pending->phone,
            'password'  => $pending->password,
            'email_verified_at' => Carbon::now(),
            'is_admin'  => 0,
        ]);

        $pending->delete();

        Auth::login($user);

        return redirect()->route('home');
    }

}
