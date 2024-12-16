<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMakeTenderController extends Controller
{
    public function showtender() {
        return view('admin_maketender');
    }
}
