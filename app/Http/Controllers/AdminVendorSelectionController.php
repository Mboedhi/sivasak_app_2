<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item_assessment;
use App\Models\vendor;
use App\Models\Item;

class AdminVendorSelectionController extends Controller
{
    public function showvendorselection() {
        // $vendors = vendor::all();
        $item_assessments = item_assessment::with('item', 'vendor')->get();

        return view('admin_vendorselection', compact('item_assessments'));
    }

    public function acceptVendor($vendor_id)
    {
        try {
            $item_assessment = item_assessment::where('vendor_id', $vendor_id)
                ->where('assessment_status', 'pending')
                ->first();

            if ($item_assessment) {
                $item_assessment->assessment_status = 'accepted';
                $item_assessment->save();

                $user = $item_assessment->vendor->user;
                if ($user) {
                    $user->role = 'tender';
                    $user->save();
                }

                return response()->json(['message' => 'Tawaran berhasil diterima.']);
            }

            return response()->json(['message' => 'Tawaran tidak ditemukan atau sudah diproses.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat memproses tawaran.'], 500);
        }
    }

    // Menolak tawaran vendor
    public function rejectVendor($vendor_id)
    {
        try {
            $item_assessment = item_assessment::where('vendor_id', $vendor_id)
                ->where('assessment_status', 'pending')
                ->first();

            if ($item_assessment) {
                $item_assessment->assessment_status = 'rejected';
                $item_assessment->save();

                return response()->json(['message' => 'Tawaran berhasil ditolak.']);
            }

            return response()->json(['message' => 'Tawaran tidak ditemukan atau sudah diproses.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat memproses tawaran.'], 500);
        }
    }
}
