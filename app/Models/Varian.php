<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_varian';
    
    protected $table = 'varian';

    protected $fillable = [
        'id_sepatu',
        'varian_sepatu',
        'deskripsi'
    ];
}
