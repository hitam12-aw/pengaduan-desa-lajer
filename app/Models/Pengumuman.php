<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman'; // tambahkan ini
    
    protected $fillable = [
        'judul',
        'isi',
    ];
}