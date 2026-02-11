<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_barang';

    protected $fillable = [
        'nama_barang',
        'harga_barang',
    ];
}
