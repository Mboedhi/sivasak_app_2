<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminMakeDriverController extends Controller
{
    public function getDriver($user_id){
        $driver = User::findOrFail($user_id);
        return response()->json($driver);
    }
    
    public function showdriver() {
        $drivers = User::where('role', 'driver')->get();

        return view('admin_makedriver', compact('drivers'));
    }
}
