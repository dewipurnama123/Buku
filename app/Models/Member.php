<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_member extends Model
{
    use HasFactory;g
    protected $table = 'members';
    protected $fillable = [
        'nama',
        'alamat',
        'nohp',
        'email',
        'password',
    ];
}
