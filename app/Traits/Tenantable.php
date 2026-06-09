<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 * @method static void creating(\Closure $callback)
 * @method static void addGlobalScope(string $identifier, \Closure $callback)
 */
trait Tenantable
{
    protected static function bootTenantable()
    {
        static::creating(function ($model) {
            /** @var \App\Models\User|null $user */
            $user = auth()->user();
            if ($user && $user->role === 'guru_bk') {
                $model->user_id = $user->id;
            }
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            /** @var \App\Models\User|null $user */
            $user = auth()->user();
            if ($user && $user->role === 'guru_bk') {
                $builder->where($builder->getModel()->getTable() . '.user_id', $user->id);
            }
        });
    }
}
