<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait Tenantable
{
    protected static function bootTenantable()
    {
        static::creating(function ($model) {
            if (auth()->check() && auth()->user()->role === 'guru_bk') {
                $model->user_id = auth()->user()->id;
            }
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            if (auth()->check() && auth()->user()->role === 'guru_bk') {
                $builder->where('user_id', auth()->user()->id);
            }
        });
    }
}
