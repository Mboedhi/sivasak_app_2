<?php

namespace App\Http\Controllers;

use App\Models\complain;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashController extends Controller
{
    public function showadmindash()
    {
        $dataSupir = User::where('role', 'driver')->count();
        $dataVendor = User::where('role', 'tender')->count();
        $dataKomplain = complain::count();

        $data = [
            'dataSupir' => $dataSupir,
            'dataVendor' => $dataVendor,
            'dataKomplain' => $dataKomplain,
        ];

        return view('admin_dashboard', $data);
    }
}
