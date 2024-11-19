<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

//     public function register(Request $request)
// {
//  // Validate input
//         $validatedData = $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|string|email|max:255|unique:users',
//             'password' => 'required|string|min:8|confirmed',
//         ]);

//         // Membuat user baru dengan peran 'tender_cand'
//         // User::create([
//         //     'username' => $request->username,
//         //     'email' => $request->email,
//         //     'password' => Hash::make($request->password),
//         //     'role' => 'tender_cand',
//         // ]);
//         // User::create(attritbutes: $validateData)
//             // Create a new user with the 'tender_cand' role
//         User::create([
//             'name' => $validatedData['name'],
//             'email' => $validatedData['email'],
//             'password' => Hash::make(value: $validatedData['password']), // Hash the password
//             'role' => 'tender_cand', // Assuming this column exists in the users table
//         ]);


//         // Redirect ke halaman login atau dashboard setelah registrasi
//         return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
//     }
    public function register(Request $request)
    {
        // Validasi input dari pengguna
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat user baru dengan role 'tender_cand'
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Meng-hash password
            'role' => 'tender_cand', // Mengatur role menjadi 'tender_cand'
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

}

