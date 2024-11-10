<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMakeDriverController extends Controller
{
    public function showdriver() {
        return view('admin_makedriver');
    }
}
