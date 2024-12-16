<?php

namespace App\Http\Controllers;

use App\Models\item_assessment;
use App\Models\negotiate;
use App\Models\User;
use App\Models\vendor;
use Exception;
use Illuminate\Http\Request;

class AdminTenderController extends Controller
{
    public function showtendercontrol()
    {

        $user_id = User::where('role', 'tender')->get()->pluck('user_id');
        $vendor = vendor::whereIn('user_id', $user_id)->with(['item_assessment.item', 'item_assessment.negotiate', 'user'])->get();

        $data = [
            'vendor' => $vendor,
        ];

        return view('admin_tendercontrol', $data);
    }

    public function deleteTender($vendor_id)
    {
        try {
            $id = item_assessment::where('vendor_id', $vendor_id)->first()->assessment_id;
            vendor::where('vendor_id', $vendor_id)->delete();
            negotiate::where('assessment_id', $id)->delete();
            item_assessment::where('vendor_id', $vendor_id)->delete();


            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
        }
    }
}
