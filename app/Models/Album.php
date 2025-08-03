<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['nama', 'deskripsi'];

    public function fotos()
    {
        return $this->hasMany(\App\Models\GaleriFoto::class);
    }
}
