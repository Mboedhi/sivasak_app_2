<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehicle;

class AdminVehiclesController extends Controller
{
    public function showvehiclescontroller() {
        $vehicles = vehicle::all();
        return view('admin_vehicles', compact('vehicles'));
    }

    public function getDetails($vehicle_id){
        $vehicle = vehicle::findOrFail($vehicle_id);
        return response()->json($vehicle);
    }
}
