<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminMakeDriverAccController extends Controller
{
    public function showdriveracc() {
        return view('admin_makedriveracc');
    }

    public function register(Request $request){
        try{
            $validateData = $request->validate([
                'name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8',
                'vehicle_type' => 'required|string|max:255',
            ]);
        $user = User::create([
            'name' => $validateData['name'],
            'phone_number' => $validateData['phone_number'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'role' => 'driver',
            'vehicle_type' => $validateData['vehicle_type'],
        ]);

        return redirect()->route('admin_makedriver')->with('success', 'Account created Successfully');

        } catch (\Exception $e){
            \Log::error('Registration error : ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Registration Failed. Please Try Again']);
        }
    }

    public function editDriver(Request $request, $user_id){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'vehicle_type' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($user_id);
        $user->update($request->only([
            'name',
            'phone_number',
            'vehicle_type',
        ]));
        return redirect('/admin_makedriver')->with('success', 'data berhasil diedit');
    }

    public function showEditDriver($user_id){
        $driver = User::findOrFail($user_id);
        return view('admin_makedriveracc', compact('driver'));
    }
}
