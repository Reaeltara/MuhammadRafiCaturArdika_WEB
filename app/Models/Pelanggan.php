<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_pelanggan';

    protected $fillable = [
        'nama_pelanggan',
        'alamat',
    ];

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'no_pelanggan', 'no_pelanggan');
    }
}
