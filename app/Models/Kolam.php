<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kolam extends Model
{
    protected $fillable = [
        'nama_kolam',
        'jenis_ikan',
        'suhu_air',
        'ph_air',
        'status_pakan',
        'pemilik',
        'status'
    ];
}
