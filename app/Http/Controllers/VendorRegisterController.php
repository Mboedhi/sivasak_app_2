<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\vendor;

class VendorRegisterController extends Controller
{

    public function register(Request $request){
        $validated = $request->validate([
            'nomor_rekanan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'nib_perusahaan' => 'required|string|max:255',
            'alamat_kantor' => 'required|string|max:255',
            'no_npwp' => 'required|string|max:255',
            'alamat_npwp' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'pimpinan' => 'required|string|max:255',
            'personil_penghubung' => 'required|string|max:255',
            'barang_jasa' => 'required|string|max:255',
            'alamat_pembayaran' => 'required|string|max:255',
            'nama_bank' => 'required|string|max:255',
            'cabang' => 'required|string|max:255',
            'no_rekening' => 'required|string|max:255',
            'atas_nama' => 'required|string|max:255',
        ]);

        $user_id = Auth::user()->user_id;

        $registered = vendor::where('user_id', $user_id)->exists();

        if ($registered){
            return redirect()->route('vendor_register')
                ->with('error', 'Pendaftaran gagal : User ID sudah terdaftar');
        }

        vendor::create([
            'user_id' => $user_id,
            'rekanan' => $validated['nomor_rekanan'],
            'company_name' => $validated['nama_perusahaan'],
            'NIB' => $validated['nib_perusahaan'],
            'address' => $validated['alamat_kantor'],
            'NPWP' => $validated['no_npwp'],
            'NPWP_address' => $validated['alamat_npwp'],
            'business_type' => $validated['bidang_usaha'],
            'leader_name' => $validated['pimpinan'],
            'contact_person' => $validated['personil_penghubung'],
            'item_type' => $validated['barang_jasa'],
            'payment_address' => $validated['alamat_pembayaran'],
            'bank' => $validated['nama_bank'],
            'acc_num' => $validated['no_rekening'],
            'behalf' => $validated['cabang'],
            'status' => $validated['atas_nama'],
        ]);

        return redirect()->route('vendor_register')->with('success', 'Pendaftaran Berhasil !!');
    }

    public function EditData(Request $request, $vendor_id){
        $vendor = vendor::findOrFail($vendor_id);
    
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'nomor_rekanan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'nib_perusahaan' => 'required|string|max:255',
            'alamat_kantor' => 'required|string|max:255',
            'no_npwp' => 'required|string|max:255',
            'alamat_npwp' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'pimpinan' => 'required|string|max:255',
            'personil_penghubung' => 'required|string|max:255',
            'barang_jasa' => 'required|string|max:255',
            'alamat_pembayaran' => 'required|string|max:255',
            'nama_bank' => 'required|string|max:255',
            'cabang' => 'required|string|max:255',
            'no_rekening' => 'required|string|max:255',
            'atas_nama' => 'required|string|max:255',
        ]);
    
        // Jika user_id tidak diubah, tidak perlu pengecekan unik
        if ($vendor->user_id == Auth::user()->user_id) {
            $request->validate([
                'user_id' => 'required|unique:vendors,user_id', // Validasi user_id jika ada perubahan
            ]);
        }
    
        // Update data vendor
        $vendor->update([
            'rekanan' => $validated['nomor_rekanan'],
            'company_name' => $validated['nama_perusahaan'],
            'NIB' => $validated['nib_perusahaan'],
            'address' => $validated['alamat_kantor'],
            'NPWP' => $validated['no_npwp'],
            'NPWP_address' => $validated['alamat_npwp'],
            'business_type' => $validated['bidang_usaha'],
            'leader_name' => $validated['pimpinan'],
            'contact_person' => $validated['personil_penghubung'],
            'item_type' => $validated['barang_jasa'],
            'payment_address' => $validated['alamat_pembayaran'],
            'bank' => $validated['nama_bank'],
            'acc_num' => $validated['no_rekening'],
            'behalf' => $validated['cabang'],
            'status' => $validated['atas_nama'],
        ]);
    
        // Redirect ke halaman vendor register dengan pesan sukses
        return redirect()->route('vendor_register')->with('success', 'Data Berhasil Diedit !!');
    }
    

    public function showEditForm($vendor_id){
        $vendor = vendor::findOrFail($vendor_id);
        return view('vendor_register', compact('vendor'));
    }

    public function showregister(){
        return view('vendor_register');
    }
}
