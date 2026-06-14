<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PortalAccount extends Model
{
    protected $fillable = [
        'user_id', 'name', 'username', 'password',
        'role', 'siswa', 'kelas', 'visible_menus'
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'visible_menus' => 'array',
    ];

    public function guruBk()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
