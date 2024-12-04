<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item_assessment;
use App\Models\vendor;
use App\Models\Item;

class AdminVendorSelectionController extends Controller
{
    public function showvendorselection() {
        $vendors = item_assessment::where('assessment_status', 'pending')->get();
        return view('admin_vendorselection', compact('vendors'));
    }

    public function acceptVendor($vendor_id){
        $vendor = item_assessment::findOrFail($vendor_id);
        $vendor->assessment_status = 'accepted';
        $vendor->save();

        return response()->json(['message' => 'Tawaran vendor diterima']);
    }

    public function rejectVendor($vendor_id){
        $vendor = item_assessment::findOrFail($vendor_id);
        $vendor->assessment_status = 'rejected';
        $vendor->save();

        return response()->json(['message' => 'Tawaran vendor ditolak']);
    }
}
