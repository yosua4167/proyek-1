<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Coba untuk login
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Jika berhasil login, arahkan ke halaman yang diinginkan
            return redirect()->intended('tampil_dashboard');
        }

        // Jika gagal login, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Username atau password salah.',
        ])->withInput($request->only('email'));
    }

    // Menangani proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
