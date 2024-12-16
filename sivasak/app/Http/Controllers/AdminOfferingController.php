<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class AdminOfferingController extends Controller
{
    public function StoreData(Request $request){
        $validateData = $request->validate([
            'item_name' => 'required|string',
            'item_type' => 'required|string',
            'item_desc' => 'required|string',
            'item_price' => 'required|numeric',
            'expired_date' => 'required|date',
            'attachment' => 'required|file',
        ]);

        if ($request->hasFile('attachment')) {
            $fileName = time() . '_' . $request->file('attachment')->getClientOriginalName();
            $filePath = $request->file('attachment')->storeAs('attachments', $fileName, 'public');
            $validateData['attachment'] = '/storage/' . $filePath;
        }

        if (Item::where('item_name', $validateData['item_name'])->exists()) {
            return redirect()->route('admin_offering')->with('error', 'Data sudah ada');
        }

        Item::create($validateData);
        return redirect('/admin_showoffering')->with('success', 'data berhasil ditambahkan');
    }

    public function EditData(Request $request, $item_id)
    {
        // Validasi input dari form
        $request->validate([
            'item_desc' => 'required|string',
            'expired_date' => 'required|date',
        ]);
    
        // Temukan item berdasarkan item_id
        $item = Item::find($item_id);
    
        if ($item) {
            // Perbarui data item
            $item->update([
                'item_desc' => $request->item_desc,
                'expired_date' => $request->expired_date,
            ]);
    
            // Redirect ke halaman daftar tawaran dengan pesan sukses
            return redirect()->route('admin_showoffering')->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect()->route('admin_showoffering')->with('error', 'Item tidak ditemukan');
        }
    }
    public function DeleteData($item_id){
        $item = Item::findOrFail($item_id);
        $item->delete();

        // return redirect('/admin_offering')->with('success', 'data berhasil dihapus');
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }

    public function EditOffering($item_id){
        $item = item::findOrFail($item_id);
        return view('admin_editoffering', compact('item'));
    }


    public function showoffering() {
        $items = Item::all();
        return view('admin_showoffering', compact('items'));
    }

    public function showadminoff() {
        return view('admin_offering');
    }

}
