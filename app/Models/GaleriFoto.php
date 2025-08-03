<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriFoto extends Model
{
    protected $fillable = ['album_id', 'judul', 'gambar'];

    public function album()
    {
        return $this->belongsTo(\App\Models\Album::class);
    }
}
