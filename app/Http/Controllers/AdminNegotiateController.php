<?php

namespace App\Http\Controllers;

use App\Models\item_assessment;
use Illuminate\Http\Request;
use App\Models\negotiate;

class AdminNegotiateController extends Controller
{
    public function shownegotiate() {
        $negotiations = negotiate::with(['item_assessment', 'item_assessment.item', 'item_assessment.vendor'])->get();

        return view('admin_negotiate', compact('negotiations'));
    }
}
