<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    // protected $table = 'produk';

    // Primary key
    protected $primaryKey = 'id_sepatu';

    // Kolom-kolom yang dapat diisi mass-assignment
    protected $fillable = [
        'nama_sepatu',
        'harga_sepatu',
        'jk_sepatu',
        'kategori_sepatu',
        'merek_sepatu',
        'deskripsi_sepatu',
        'gambar_sepatu',
    ];
}
