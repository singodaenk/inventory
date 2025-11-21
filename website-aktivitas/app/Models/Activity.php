<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_aktivitas',
        'deskripsi', // Diubah dari 'description'
        'tanggal',   // Diubah dari 'date'
        'no_hp',
        'status',
    ];
}