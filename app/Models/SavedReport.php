<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Tenantable;

class SavedReport extends Model
{
    use Tenantable;

    protected $fillable = ['user_id', 'judul', 'tipe', 'stats_data', 'format'];

    protected $casts = [
        'stats_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
