<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class e_wallet extends Model
{
     protected $fillable = [
        'id',
        'nama_wallet',
        'nomor_akun',
    ];
}
