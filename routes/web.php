<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;

Route::get('/', [ProdukController::class, 'showHomePage'])->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cari', [ProdukController::class, 'cariProduk'])->name('cari');
Route::post('/cari', [ProdukController::class, 'filterProduk'])->name('filter');
Route::get('/produk/{id_sepatu}', [ProdukController::class, 'detailProduk'])->name('detail.produk');
Route::get('/kategori/{kategori}', [ProdukController::class, 'filterByKategori'])->name('filter.kategori');

Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang', [KeranjangController::class, 'store']);
    Route::put('/keranjang/{id}', [KeranjangController::class, 'update']);
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
    Route::post('/checkout', [CheckoutController::class, 'showCheckout']);
    Route::post('/profile', [AuthController::class, 'saveBio']);
});

Route::middleware(['admin','auth'])->group(function () {
    Route::get('/adminproduct', function () {
        return view('adminproduct');
    })->name('adminproduct');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/user/update/{id}', [AdminController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/delete/{id}', [AdminController::class, 'delete'])->name('admin.user.delete');

    Route::post('/produk/tambah', [ProdukController::class, 'tambahProduk'])->name('produk.tambah');
    Route::get('/produk/hapus', function () {
        $produk = \App\Models\Produk::all();
        return view('hapus_produk', compact('produk'));
    })->name('produk.hapus');
    Route::get('/produk/edit', function () {
        $produk = \App\Models\Produk::all();
        return view('edit_produk', compact('produk'));
    })->name('produk.edit');

    Route::delete('/produk/hapus/{id}', [ProdukController::class, 'hapusProduk'])->name('produk.hapus.action');
    Route::post('/produk/edit/{id}', [ProdukController::class, 'editProduk'])->name('produk.edit.action');
});



Route::get('/filter', [ProdukController::class, 'showfilter']);

