<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\item_assessment;

class VendorNegotiateController extends Controller
{
    public function show_vendornegotiate(){
        $vendor_id = Auth::user()->vendor->vendor_id;

        $item_assessments = item_assessment::with(['vendor', 'item', 'negotiate'])
            ->where('vendor_id', $vendor_id)
            ->get();

        return view('vendor_negotiate', compact('item_assessments'));
    }
}
