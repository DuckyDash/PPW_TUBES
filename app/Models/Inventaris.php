<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';

    protected $fillable = [
        'nomor_barang',
        'nama_barang',
        'kondisi',
        'pemilik',
        'jumlah',
        'keterangan',
    ];
}
