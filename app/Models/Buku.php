<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $fillable = [
        'id_kategori',
        'judul',
        'penerbit',
        'pengarang',
        'tahun',
        'harga',
        'stok',
    ];
}
