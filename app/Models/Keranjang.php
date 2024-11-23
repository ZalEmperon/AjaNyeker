<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_keranjang';
    protected $table = 'keranjang';

    protected $fillable = [
        'id_user',
        'id_sepatu',
        'jumlah_produk',
        'ukuran_sepatu',
        'varian_sepatu',
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk'); // Pastikan foreign key-nya sesuai
    }
}
