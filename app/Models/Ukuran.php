<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ukuran';
    
    protected $table = 'ukuran';

    protected $fillable = [
        'id_sepatu',
        'ukuran_sepatu'
    ];
}
