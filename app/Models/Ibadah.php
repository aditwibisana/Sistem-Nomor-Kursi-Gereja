<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibadah extends Model
{
    use HasFactory;
    protected $table = 'ibadah';
    protected $fillable = [
        'nama_gereja',
        'nama_pendeta',
        'jam_ibadah',
        'kapasitas_kursi',
    ];
}
