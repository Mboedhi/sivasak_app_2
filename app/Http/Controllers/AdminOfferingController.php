<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminOfferingController extends Controller
{
    public function showadminoff() {
        return view('admin_offering');
    }
}
