<?php

namespace App\Traits;

trait ScopeVisibleTrait
{
    public function scopeVisible($query)
    {
        return $query
            ->where('visibility_date_from', '<=', now()->toDateString())
            ->where('visibility_date_to', '>=', now()->toDateString());
    }
}
