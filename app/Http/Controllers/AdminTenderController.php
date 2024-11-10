<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTenderController extends Controller
{
    public function showtendercontrol() {
        return view('admin_tendercontrol');
    }
}
