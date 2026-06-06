<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselingSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'kelas', 'tanggal', 'topik', 'jenis',
        'status', 'durasi', 'ringkasan', 'signature'
    ];

    protected $casts = [
        'signature' => 'boolean',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
