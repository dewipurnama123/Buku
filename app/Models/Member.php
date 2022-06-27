<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $primary = 'id';
    protected $fillable = [
        'nama',
        'province_id',
        'city_id',
        'alamat',
        'provinsi',
        'kecamatan',
        'nohp',
        'email',
        'password',
    ];
}
