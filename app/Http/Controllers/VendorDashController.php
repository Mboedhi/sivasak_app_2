<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorDashController extends Controller
{
    public function showvendordash() {
        return view('vendor_dashboard');
    }
}
