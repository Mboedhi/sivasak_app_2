<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminVehiclesController extends Controller
{
    public function showvehiclescontroller() {
        return view('admin_vehicles');
    }
}
