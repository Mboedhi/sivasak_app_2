<?php

namespace App\Http\Controllers;

use App\Models\item_assessment;
use Illuminate\Http\Request;
use App\Models\negotiate;
use App\Models\User;
use Exception;

class AdminNegotiateController extends Controller
{
    public function shownegotiate()
    {
        $negotiations = negotiate::with(['item_assessment', 'item_assessment.item', 'item_assessment.vendor', 'item_assessment.vendor.user'])->get();

        return view('admin_negotiate', compact('negotiations'));
    }

    public function acceptNegotiate(Request $request, $id)
    {
        try {
            negotiate::where('negotiate_id', $id)->update(['result' => 'accepted']);
            $user_id = negotiate::where('negotiate_id', $id)->first()->item_assessment->vendor->user->user_id;
            User::where('user_id', $user_id)->update(['role' => 'tender']);

            return redirect()->back();

        } catch (Exception $e) {
            dd($e);
        }


    }

    public function rejectNegotiate(Request $request, $id)
    {
        try {
            negotiate::where('negotiate_id', $id)->update(['result' => 'rejected']);

            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
        }

    }

    public function deleteNegotiate(Request $request, $id)
    {
        try {
            negotiate::where('negotiate_id', $id)->delete();

            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
        }

    }
}
