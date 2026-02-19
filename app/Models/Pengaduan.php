<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    
    protected $fillable = [
        'nomor_tiket',
        'nama',
        'no_hp',
        'kategori',
        'judul',
        'deskripsi',
        'foto',
        'status',
        'balasan',
    ];
}