<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('login.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('index')
                ->withSuccess('Signed in successfully');
        }

        return back()->withErrors(['email' => 'Invalid login details.']);
    }

    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return back();
    }

    public function showResetForm()
    {
        return view('login.Reset');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect or user not found.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }

    public function showForgotForm()
    {
        return view('login.ForgotPassword');
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Reset link sent to your email.');
        } else {
            return back()->withErrors(['email' => 'Email not found or error sending reset link.']);
        }
    }
}
