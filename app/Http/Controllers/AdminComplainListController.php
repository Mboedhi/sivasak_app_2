<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminComplainListController extends Controller
{
    public function showcomplaincontroller() {
        return view('admin_complainlist');
    }
}
