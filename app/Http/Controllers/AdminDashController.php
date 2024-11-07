<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function showadmindash() {
        return view('admin_dashboard');
    }
}
