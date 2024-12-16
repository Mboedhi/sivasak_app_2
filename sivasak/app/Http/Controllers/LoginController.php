<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showlogin()
    {
        Log::info('User logged in.');
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Cek apakah user adalah admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin_dashboard'); // Ganti dengan route dashboard admin Anda
            } else {
                // Auth::logout();
                return redirect()->route('vendor_dahsboard');
                //->withErrors(['msg' => 'Hanya admin yang bisa mengakses halaman ini.'])
            }
        }

        return redirect()->route('login')->withErrors(['msg' => 'Email atau password salah.']);
    }
}

