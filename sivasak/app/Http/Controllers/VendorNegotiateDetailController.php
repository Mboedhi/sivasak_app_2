<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\item_assessment;
use App\Models\negotiate;

class VendorNegotiateDetailController extends Controller
{
    public function show_vendornegotiatedetail($assessment_id){
        $item_assessment = item_assessment::findOrFail($assessment_id);

        return view('vendor_negotiate_detail', compact('item_assessment'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'assessment_id' => 'required|exists:item_assessments,assessment_id',
            'price_nego' => 'required|numeric|min:1',
        ]);

        negotiate::create([
            'assessment_id' => $validatedData['assessment_id'],
            'price_nego' => $validatedData['price_nego'],
            'result' => 'pending',
        ]);

        return redirect()->route('vendor_negotiate')->with('success', 'Negosiasi berhasil diajukan.');
    }
}
