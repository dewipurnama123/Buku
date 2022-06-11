<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $primary = 'id_member';
    protected $fillable = [
        'nama',
        'alamat',
        'provinsi',
        'kecamatan',
        'nohp',
        'email',
        'password',
    ];
}
