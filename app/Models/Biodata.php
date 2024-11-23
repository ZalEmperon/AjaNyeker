<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_biodata';
    
    protected $table = 'biodata';

    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'phone_number',
        'alamat'
    ];
}