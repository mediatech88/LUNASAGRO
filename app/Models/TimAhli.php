<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimAhli extends Model
{
    use HasFactory;

    protected $table = 'tim_ahli';

    protected $fillable = [
        'user_id',
        'pelayanan_id',
        'status',
        'provinsi',
        'kota',
        'kecamatan',
        'desa',
        'code',
    ];
}
