<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_transaksi',
        'nama_item',
        'harga',
        'status'
    ];
}
