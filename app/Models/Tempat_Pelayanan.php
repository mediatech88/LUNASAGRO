<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempat_Pelayanan extends Model
{

    protected $fillable = [
        'id',
        'id_user',
        'reff'

    ];
    protected $table ='tempat_pelayanan';
    protected $primaryKey ='id';
    public $timestamps = false;
}
