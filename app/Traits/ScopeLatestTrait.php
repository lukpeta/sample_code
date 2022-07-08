<?php

namespace App\Traits;

trait ScopeLatestTrait
{
    public function scopeLatest($query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }
}
