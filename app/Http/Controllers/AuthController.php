<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Kalau role admin, arahkan ke dashboard
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }

            // Kalau bukan admin, logout otomatis
            Auth::logout();
            return back()->withErrors([
                'email' => 'Hanya admin yang dapat login melalui halaman ini.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Email atau Kata Sandi salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
