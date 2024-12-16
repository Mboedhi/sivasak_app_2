<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vendor;

class VendorDashController extends Controller
{
    public function showvendordash() {
        $user = Auth::user();

        $vendor = vendor::where('user_id', $user->user_id)->first();

        return view('vendor_dashboard', compact('user', 'vendor'));
    }
}
