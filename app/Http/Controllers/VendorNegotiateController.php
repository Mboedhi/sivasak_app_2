<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorNegotiateController extends Controller
{
    public function show_vendornegotiate(){
        return view('vendor_negotiate');
    }
}
