<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;

class AdminVehiclesController extends Controller
{
    public function showVehiclesController()
    {
        $vehicles = Vehicle::orderBy('vehicle_tax', 'asc')
            ->get()
            ->sortBy(function ($vehicle) {
                $daysUntilTax = now()->diffInDays($vehicle->vehicle_tax, false);
                return $daysUntilTax <= 14 ? -1 : $daysUntilTax;
            });

        return view('admin_vehicles', compact('vehicles'));
    }

    public function getDetails($vehicle_id)
    {
        $vehicle = Vehicle::findOrFail($vehicle_id);

        return response()->json($vehicle);
    }
}
