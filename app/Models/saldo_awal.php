<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saldo_awal extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_perkiraan',
        'nama_perkiraan',
        'jenis',
        'saldo_awal',
        'created_by',
    ];
}
