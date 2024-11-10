<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminVendorSelectionController extends Controller
{
    public function showvendorselection() {
        return view('admin_vendorselection');
    }
}
