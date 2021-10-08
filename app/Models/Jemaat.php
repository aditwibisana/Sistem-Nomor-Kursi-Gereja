<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;
    protected $table = 'jemaat';
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'nik',
        'usia',
        'no_kursi',
    ];
}
