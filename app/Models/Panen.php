<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kolam() {
        return $this->belongsTo(Kolam::class);
    }
}