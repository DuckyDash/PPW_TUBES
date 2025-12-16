<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $fillable = [
        'nomor_transaksi',
        'nama_transaksi',
        'tanggal',
        'tipe',
        'nominal',
        'status',
        'keterangan',
    ];
}
