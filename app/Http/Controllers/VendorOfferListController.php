<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use NumberFormatter;
use App\Models\Item;
use App\Models\vendor;
use App\Models\item_assessment;

class VendorOfferListController extends Controller
{

    public function storeassessment(Request $request){
        
        $validateData = $request->validate([
            'assessment_amount' => 'required|integer|min:1',
            'assessment_note' => 'nullable|string',
            'item_id' => 'required|exists:items,item_id'
        ]);

        $vendor_id = Auth::user()->vendor->vendor_id;

        item_assessment::create([
            'vendor_id' => $vendor_id,
            'item_id' => $validateData['item_id'],
            'assessment_amount' => $validateData['assessment_amount'],
            'assessment_note' => $validateData['assessment_note'],
            'assessment_status' => 'pending',
        ]);
        return redirect()->route('vendor_offer_list')->with('success', 'Data tawaran berhasil diajukan.');
    }

    public function showofferlist(){
        $items = item::all();

        $formatter = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);

        foreach ($items as $item){
            $item->formatted_price = $formatter->formatCurrency($item->item_price, 'IDR');
        }

        return view('/vendor_offer_list', compact('items'));
    }
    public function getDetails($item_id){
        $item = item::findOrFail($item_id);
        return response()->json($item);
    }
}
