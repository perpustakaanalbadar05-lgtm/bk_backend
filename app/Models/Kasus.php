<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;
    
    protected $table = 'cases';

    protected $fillable = [
        'siswa', 'kelas', 'kasus', 'poin', 'status', 'visit', 'date'
    ];

    protected $casts = [
        'visit' => 'boolean',
    ];
}
