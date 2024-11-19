<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NumberFormatter;
use App\Models\item;

class AdminShowOfferingController extends Controller
{
    public function showoffering() {
        $items = item::all();
        
        $formatter = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
        foreach ($items as $item) {
            $item->formatted_price = $formatter->formatCurrency($item->item_price, 'IDR');
        }

        return view('/admin_showoffering', compact('items'));
    }

    public function getDetails($item_id){
        $item = item::findOrFail($item_id);
        return response()->json($item);
    }
}
