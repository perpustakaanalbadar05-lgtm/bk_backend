<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentResult extends Model
{
    protected $fillable = ['user_id', 'type', 'result_data'];

    protected $casts = [
        'result_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
