<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    protected $table = 'tentang_kami';
    
    protected $fillable = [
        'filosofi_logo',
        'tentang_kami', 
        'sejarah',
        'doa_santa_anna'
    ];
}
