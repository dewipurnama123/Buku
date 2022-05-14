<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjangtmp extends Model
{
    use HasFactory;
    protected $table = 'keranjangtmps';
    protected $fillable = [
        'id_transaksi',
        'id_buku',
        'tgl',
        'stok',
        'ket',
        'total',
    ];
}
