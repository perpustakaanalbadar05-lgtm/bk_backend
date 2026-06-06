<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nis', 'kelas', 'jk', 'status', 'hp', 'alamat'
    ];

    public function counselingSessions()
    {
        return $this->hasMany(CounselingSession::class);
    }

    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
}
