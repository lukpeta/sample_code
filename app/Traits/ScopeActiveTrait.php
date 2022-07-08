<?php

namespace App\Traits;


trait ScopeActiveTrait
{
    public function scopeActive($query)
    {
        return $query->where('is_enable', true);
    }
}
