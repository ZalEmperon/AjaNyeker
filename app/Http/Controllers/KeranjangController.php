<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Keranjang;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = DB::table('keranjang')->join('produks', 'keranjang.id_sepatu', '=', 'produks.id_sepatu') ->where('id_user', Auth::user()->id_user) ->get();
        // dd($keranjang);
        return view('cart', compact('keranjang'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_sepatu' => 'required|integer',
            'jumlah_produk' => 'required|integer',
            'ukuran_sepatu' => 'nullable|string|max:10',
            'varian_sepatu' => 'nullable|string|max:50',
        ]);
    
        $validatedData['id_user'] = Auth::user()->id_user;
        Keranjang::create($validatedData);
        return redirect('/keranjang');
    }

    public function update(Request $request, $id)
    {
        $keranjang = Keranjang::findOrFail($id);

        $validatedData = $request->validate([
            'id_user' => 'nullable|integer',
            'id_sepatu' => 'nullable|integer',
            'jumlah_produk' => 'nullable|integer',
            'ukuran_sepatu' => 'nullable|string|max:10',
            'varian_sepatu' => 'nullable|string|max:50',
        ]);

        $keranjang->update($validatedData);
        return response()->json($keranjang);
    }

    public function destroy($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();
        return redirect('/keranjang');
    }
}
