<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item_assessment;
use App\Models\Item;

class AdminVendorSelectionController extends Controller
{
    public function showvendorselection() {
        $vendors = item_assessment::where('assessment_status', 'pending')->get();
        return view('admin_vendorselection', compact('vendors'));
    }
}
