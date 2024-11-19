<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class AdminInputVehicleController extends Controller
{
    public function StoreData(Request $request){
        $validateData = $request->validate([
            'vehicle_plate' => 'required|string',
            'year' => 'required|string',
            'vehicle_type' => 'required|string',
            'vehicle_registration' => 'required|string',
            'registration_expired' => 'required|date',
            'vehicle_tax' => 'required|date',
            'head_cover_date' => 'required|date',
            'tail_cover_date' => 'required|date',
            'note' => 'required|string',
        ]);

        $exists = Vehicle::where('vehicle_plate', $validateData['vehicle_plate'])
            ->where('vehicle_registration', $validateData)
            ->exists();

        if ($exists){
            return redirect('/admin_vehicles')->with('error', 'data sudah ada');
        }

        Vehicle::create(attributes: $validateData);
        return redirect('/admin_vehicles')->with('success', 'data berhasil ditambahkan');
    }

    public function EditData(Request $request, $vehicle_id){
        $request->validate([
            'vehicle_plate' => 'required|string|max:10',
            'year' => 'required|string|max:6',
            'vehicle_type' => 'required|string|max:70',
            'vehicle_registration' => 'required|string|max:70',
            'registration_expired' => 'required|date',
            'vehicle_tax' => 'required|date',
            'head_cover_date' => 'required|date',
            'tail_cover_date' => 'required|date',
            'note' => 'nullable|string|max:255',
        ]);

        $vehicle = Vehicle::findOrFail($vehicle_id);
        $vehicle->update($request->only([
            'year', 
            'vehicle_type', 
            'vehicle_tax', 
            'head_cover_date', 
            'tail_cover_date', 
            'note'
        ]));

        return redirect('/admin_vehicles')->with('success', 'data berhasil diedit');
    }

    public function DeleteData($vehicle_id){
        $vehicle = Vehicle::findOrFail($vehicle_id);
        $vehicle->delete();

        // return redirect('/admin_vehicles')->with('success', 'data berhasil dihapus');
        return response()->json(['success' => true]);
    }

    public function showEditForm($vehicle_id){
        $vehicle = vehicle::findOrFail($vehicle_id);
        return view('admin_inputvehicle', compact('vehicle'));
    }

    public function showinputvehicle() {
        return view('admin_inputvehicle');
    }
}
