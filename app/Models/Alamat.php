<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'provinsi',
        'kota_kab',
        'kecamatan',
        'desa',
        'alamat_lain'
    ];

    protected $table ='alamat';
    protected $primaryKey ='id_alamat';

}
