<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelayanan extends Model
{
    use HasFactory;

    protected $table = 'pelayanan';

    protected $fillable = [
        'user_id',
        'provinsi',
        'kota',
        'kecamatan',
        'desa',
        'code',
    ];



    // public function user()
    // {
    //     return $this->hasOne(User::class);
    // }
}
