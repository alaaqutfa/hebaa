<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function getLogin()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'Email is required.',
            'email.email'       => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (! $user->email_verified_at) {
                Auth::logout();
                return back()->with('error', 'You must verify your email before logging in.');
            }

            return $user->is_admin
            ? redirect()->intended(route('admin.dashboard'))
            : redirect()->intended(route('home'));
        }

        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // حذف بيانات الجلسة
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.get.login')->with('message', 'You have been logged out successfully.');
    }
}
