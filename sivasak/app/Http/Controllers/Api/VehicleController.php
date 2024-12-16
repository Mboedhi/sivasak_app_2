<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $vehicles = Vehicle::where('user_id', $request->id)->get();

        $new_vehicle = Vehicle::all();
        
        return response()->json([
            'status' => 'success',
            'data' => $new_vehicle
        ]);
    }   
}