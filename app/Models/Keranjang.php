<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjangs';
    protected $fillable = [
        'id_transaksi',
        'id_member',
        'id_buku',
        'tgl',
        'stok',
        'ket',
        'harga',
        'quantity',
        'total',
    ];
}
