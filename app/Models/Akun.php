<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akuns'; // Ubah dari 'akun' menjadi 'akuns'

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
}
