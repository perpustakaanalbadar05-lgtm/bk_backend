<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Tenantable;

class Schedule extends Model
{
    use HasFactory, Tenantable;

    protected $fillable = [
        'class', 'topic', 'time', 'status', 'attended', 'total',
        'date', 'materi', 'metode', 'catatan', 'attendance_data'
    ];

    protected $casts = [
        'attendance_data' => 'array',
    ];
}
