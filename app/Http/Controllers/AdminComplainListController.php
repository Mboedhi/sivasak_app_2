<?php

namespace App\Http\Controllers;

use App\Models\complain;
use Exception;
use Illuminate\Http\Request;

class AdminComplainListController extends Controller
{
    public function showcomplaincontroller()
    {
        $complain = complain::with(['user', 'vehicle'])->get();

        return view('admin_complainlist', compact('complain'));
    }


    public function acceptComplain($id)
    {
        try {
            complain::where('complain_id', $id)->update(['complain_status' => 'accepted']);
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function rejectComplain($id)
    {
        try {
            complain::where('complain_id', $id)->update(['complain_status' => 'rejected']);
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
        }
    }
}
