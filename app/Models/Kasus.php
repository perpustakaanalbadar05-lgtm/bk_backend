<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;
    
    protected $table = 'cases';

    protected $fillable = [
        'student_id', 'kelas', 'kasus', 'poin', 'status', 'visit', 'konseling', 'panggilan', 'date'
    ];

    protected $casts = [
        'poin' => 'integer',
        'visit' => 'boolean',
        'konseling' => 'boolean',
        'panggilan' => 'boolean',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
