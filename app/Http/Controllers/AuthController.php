<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|exists:users',
                'password' => 'required'
            ]
        );
        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );
        if (Auth::attempt($user_data)) {
            return redirect()->route('admin')->withSuccess('You have Successfully Login');
        } else {
            return redirect()->back()->withErrors('Wrong Login Details');
        }
    }
    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]
        );
        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]
        );
        return redirect()->route('login')->withSuccess('You have Successfully Registered');
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
