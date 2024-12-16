<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendor;

class AdminVendorListController extends Controller
{
    public function showvendor() {
        $vendors = vendor::all();
        return view('admin_vendor_list', compact('vendors'));
    }
    public function getDetails($vendor_id){
        $vendor = vendor::findOrFail($vendor_id);
        return response()->json($vendor);
    }
}
