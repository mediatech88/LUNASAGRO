<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraTani extends Model
{
    use HasFactory;

    protected $table = 'mitra_tani';

    protected $fillable = [
        'user_id',
        'admin_id',
        'korlap_id',
        'status',
        'provinsi',
        'kota',
        'kecamatan',
        'desa',
        'koordinat_lat',
        'koordinat_long',
        'elevasi',
        'luas_lahan',
        'code',
    ];
}
