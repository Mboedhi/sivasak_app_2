<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminNegotiateController extends Controller
{
    public function shownegotiate() {
        return view('admin_negotiate');
    }
}
