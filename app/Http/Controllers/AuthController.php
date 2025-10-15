<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth');
    }

    public function showRegister()
    {
        return view('auth');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['loginError' => 'Username atau Password salah!']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // AUTO LOGIN ✅

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
