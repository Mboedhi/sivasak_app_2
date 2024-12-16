<?php

namespace App\Http\Controllers;

use App\Models\complain;
use App\Services\FirebaseService;
use Exception;
use Illuminate\Http\Request;

class AdminComplainListController extends Controller
{
    private $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }

    public function syncComplain()
    {
        $complains = $this->firebaseService->getComplaints();

        // foreach ($complains as $complain) {
        //     // Simpan ke database MySQL
        //     complain::create([
        //         'nopol' => $complain['vehicle_plate'],
        //         'jenis_kendaraan' => $complain['vehicle_type'],
        //         'keterangan' => $complain['complain_desc'],
        //         'stnk' => $complain['vehicle_registration'],
        //     ]);
        // }

        \log::info('data dari firebase: ', $complains);
        
        foreach ($complains as $complain) {
            // Simpan ke database MySQL
            complain::create([
                'vehicle_plate' => $complain['vehicle_plate'],
                'vehicle_type' => $complain['vehicle_type'],
                'complain_desc' => $complain['complain_desc'],
                'vehicle_registration' => $complain['vehicle_registration'],
                'complain_status' => 'pending',
            ]);
        }

        return response()->json(['message' => 'Complain synced successfully']);
    }

    public function showcomplaincontroller()
    {
        // $complain = complain::with(['user', 'vehicle'])->get();
        $complains = complain::with('vehicle')->get();

        return view('admin_complainlist', compact('complains'));
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
