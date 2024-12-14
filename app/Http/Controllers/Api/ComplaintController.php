<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\complain;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        $vehicle = Vehicle::where('vehicle_plate', $request->vehicle_plate)->first();
        if (!$vehicle) {
            return response()->json([
                'message' => 'Vehicle not found'
            ], 404);
        }
        $complaint = new complain();
        $complaint->user_id = $request->id;
        $complaint->vehicle_id = $vehicle->vehicle_id;
        $complaint->complain_desc = $request->complaint;
        $complaint->complain_status = 'pending';
        $save = $complaint->save();
        if ($save) {
            return response()->json([
                'message' => 'Complaint submitted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to submit complaint'
            ], 500);
        }
    }
}
