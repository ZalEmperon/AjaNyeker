<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class CheckoutController extends Controller
{
    public function showCheckout(Request $request)
    {
        $subtotal = 0;
        if ($request->has('selected_items')) {
            $itemsdata = json_decode($request->input('selected_items'), true);
            foreach ($itemsdata as &$item) { 
                $item['id_user'] = Auth::user()->id_user;
                $checkoutdata = Produk::where('id_sepatu', $item['id_sepatu'])->first();
                if ($checkoutdata) {
                    $item['nama_sepatu'] = $checkoutdata->nama_sepatu;
                    $item['harga_sepatu'] = $checkoutdata->harga_sepatu;
                }
                $subtotal = $subtotal + ($item['harga_sepatu'] * $item['jumlah_produk']);
            }
        } else {
            $itemsdata = $request->validate([
                'id_sepatu' => 'required|integer',
                'jumlah_produk' => 'required|integer',
                'ukuran_sepatu' => 'nullable|string|max:10',
                'varian_sepatu' => 'nullable|string|max:50',
            ]);
            $itemsdata['id_user'] = Auth::user()->id_user;
            $checkoutdata = Produk::where('id_sepatu', $itemsdata['id_sepatu'])->first();
            if ($checkoutdata) {
                $itemsdata['nama_sepatu'] = $checkoutdata->nama_sepatu;
                $itemsdata['harga_sepatu'] = $checkoutdata->harga_sepatu;
            } 
            $subtotal = $subtotal + ($itemsdata['harga_sepatu'] * $itemsdata['jumlah_produk']);
            $itemsdata = [$itemsdata];
        }
        
        return view('checkout', compact('itemsdata', 'subtotal'));
    }
}
