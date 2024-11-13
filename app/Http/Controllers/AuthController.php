<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Cari petugas berdasarkan username dan password langsung
        $petugas = Petugas::where([
            'username' => $credentials['username'],
            'password' => $credentials['password']
        ])->first();

        // Jika petugas ditemukan
        if ($petugas) {
            Auth::guard('petugas')->login($petugas);
            return redirect('/admin/dashboard')->with('success', 'Login berhasil!');
        }

        // Jika login gagal
        return back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        Auth::guard('petugas')->logout();
        return redirect('/login')->with('success', 'Berhasil logout');
    }
} 