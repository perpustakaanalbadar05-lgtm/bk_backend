<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentTemplate extends Model
{
    protected $fillable = ['user_id', 'type', 'master_data'];

    protected $casts = [
        'master_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
