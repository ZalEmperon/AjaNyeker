<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Ukuran;
use App\Models\Varian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\storage;

class ProdukController extends Controller
{
    public function tambahProduk(Request $request)
    {
        $request->validate([
            'nama_sepatu' => 'required',
            'harga_sepatu' => 'required',
            'jk_sepatu' => 'required',
            'warna_sepatu' => 'required|array',
            'desk_sepatu' => 'required|array',
            'ukuran_sepatu' => 'required|array',
            'kategori_sepatu' => 'required',
            'merek_sepatu' => 'required',
            'deskripsi_sepatu' => 'required',
            'gambar_sepatu' => 'required'
        ]);

        $fileName = null;
        if ($request->hasFile('gambar_sepatu')) {
            $fileName = time() . '_' . Str::random(10) . '.' . $request->file('gambar_sepatu')->extension();
            $request->file('gambar_sepatu')->storeAs('images/produk', $fileName, 'public');
        }

        $produk = Produk::create([
            'nama_sepatu' => $request->nama_sepatu,
            'harga_sepatu' => $request->harga_sepatu,
            'jk_sepatu' => $request->jk_sepatu,
            'kategori_sepatu' => $request->kategori_sepatu,
            'merek_sepatu' => $request->merek_sepatu,
            'deskripsi_sepatu' => $request->deskripsi_sepatu,
            'gambar_sepatu' => $fileName
        ]);

        $produkId = $produk->id_sepatu;

        $warnaSepatu = $request->input('warna_sepatu');
        $deskSepatu = $request->input('desk_sepatu');
        foreach ($warnaSepatu as $index => $warna) {
            if (isset($deskSepatu[$index])) {
                Varian::create([
                    'id_sepatu' => $produkId,
                    'varian_sepatu' => $warna, 
                    'deskripsi' => $deskSepatu[$index], 
                ]);
            }
        }

        foreach ($request->ukuran_sepatu as $ukuran) {
            Ukuran::create([
                'id_sepatu' => $produkId,
                'ukuran_sepatu' => $ukuran
            ]);
        }
        
        return redirect('/');
    }

    public function filterByKategori($kategori)
    {
        $produk = Produk::where('kategori_sepatu', 'like', '%' . $kategori . '%')->get();
    
        if ($produk->isEmpty()) {
            return view('filter', [
                'produk' => $produk,
                'kategori' => $kategori,
                'message' => "Tidak ada produk ditemukan untuk kategori \"$kategori\"."
            ]);
        }
    
        return view('filter', [
            'produk' => $produk,
            'kategori' => $kategori
        ]);
    }

    public function hapusProduk($id_sepatu)
    {
        $produk = Produk::find($id_sepatu);

        if (!$produk) {
            return redirect('/adminproduct')->with('error', 'Produk tidak ditemukan.');
        }

        if ($produk->gambar_sepatu) {
            Storage::disk('public')->delete('images/produk/' . $produk->gambar_sepatu);
        }

        $produk->delete();

        return redirect('/adminproduct')->with('success', 'Produk berhasil dihapus.');
    }

    // Method to edit a product
    public function editProduk($id_sepatu, Request $request)
    {
        $produk = Produk::find($id_sepatu);

        if (!$produk) {
            return redirect('/adminproduct')->with('error', 'Produk tidak ditemukan.');
        }

        $request->validate([
            'nama_sepatu' => 'required',
            'harga_sepatu' => 'required',
            'jk_sepatu' => 'required',
            'kategori_sepatu' => 'required',
            'merek_sepatu' => 'required',
            'deskripsi_sepatu' => 'required',
        ]);

        $fileName = $produk->gambar_sepatu;
        if ($request->hasFile('gambar_sepatu')) {
            // Delete old image
            if ($fileName) {
                Storage::disk('public')->delete('images/produk/' . $fileName);
            }
            $fileName = time() . '_' . $request->file('gambar_sepatu')->getClientOriginalName();
            $request->file('gambar_sepatu')->storeAs('images/produk', $fileName, 'public');
        }

        $produk->update([
            'nama_sepatu' => $request->nama_sepatu,
            'harga_sepatu' => $request->harga_sepatu,
            'jk_sepatu' => $request->jk_sepatu,
            'kategori_sepatu' => $request->kategori_sepatu,
            'merek_sepatu' => $request->merek_sepatu,
            'deskripsi_sepatu' => $request->deskripsi_sepatu,
            'gambar_sepatu' => $fileName
        ]);

        return redirect('/adminproduct')->with('success', 'Produk berhasil diperbarui.');
    }

    public function cariProduk(Request $request)
    {
        $query = $request->input('search'); // Ambil nilai input search
        $produk = Produk::where('nama_sepatu', 'like', '%' . $query . '%')
            ->orWhere('merek_sepatu', 'like', '%' . $query . '%')
            ->orWhere('kategori_sepatu', 'like', '%' . $query . '%')
            ->get();

        return view('filter', compact('produk', 'query')); // Kirim $query ke view
    }

    public function detailProduk($id_sepatu)
    {
        $produk = Produk::find($id_sepatu);
        $ukuran = Ukuran::where('id_sepatu', $id_sepatu)->get();
        $varian = Varian::where('id_sepatu', $id_sepatu)->get();

        if (!$produk) {
            return redirect('/')->with('error', 'Produk tidak ditemukan.');
        }else{
            return view('description', compact('produk', 'ukuran', 'varian'));
        }
    }

    public function filterProduk(Request $request)
    {
        $query = Produk::query();

        if ($request->has('jk_sepatu')) {
            $query->whereIn('jk_sepatu', $request->input('jk_sepatu'));
        }
        if ($request->has('merek_sepatu')) {
            $query->whereIn('merek_sepatu', $request->input('merek_sepatu'));
        }
        if ($request->has('kategori_sepatu')) {
            $query->whereIn('kategori_sepatu', $request->input('kategori_sepatu'));
        }
        if ($request->filled('harga_sepatu_rendah') || $request->filled('harga_sepatu_tinggi')) {
            $query->when($request->filled('harga_sepatu_rendah'), function ($q) use ($request) {
                $q->where('harga_sepatu', '>=', $request->input('harga_sepatu_rendah'));
            });
            $query->when($request->filled('harga_sepatu_tinggi'), function ($q) use ($request) {
                $q->where('harga_sepatu', '<=', $request->input('harga_sepatu_tinggi'));
            });
        }
        $produk = $query->get();
        return view('filter', compact('produk'));
    }

    public function showfilter()
    {
        $produk = Produk::all();
        return view('filter', compact('produk'));
    }

    public function showHomePage()
    {
        $produk = Produk::all();
        return view('home', compact('produk'));
    }
}
