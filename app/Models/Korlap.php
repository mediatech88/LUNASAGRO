<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korlap extends Model
{
    use HasFactory;

    protected $table = 'korlap';

    protected $fillable = [
        'user_id',
        'admin_id',
        'provinsi',
        'kota',
        'kecamatan',
        'desa',
        'code',
    ];
}
