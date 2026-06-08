<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Tenantable;

class Student extends Model
{
    use HasFactory, Tenantable;

    protected $fillable = [
        'nama', 'nis', 'kelas', 'jk', 'status', 'hp', 'alamat'
    ];

    public function counselingSessions()
    {
        return $this->hasMany(CounselingSession::class);
    }

    public function kasus()
    {
        return $this->hasMany(Kasus::class);
    }
}
