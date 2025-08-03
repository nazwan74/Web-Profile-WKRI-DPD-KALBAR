<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKamiImage extends Model
{
    use HasFactory;

    protected $table = 'tentang_kami_images';
    
    protected $fillable = [
        'logo',
        'struktur_organisasi'
    ];
}
