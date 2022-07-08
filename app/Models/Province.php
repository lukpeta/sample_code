<?php

namespace App\Models;

use App\Traits\ScopeActiveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory,
        ScopeActiveTrait;

    protected $fillable = [
        'name',
        'is_enable',
    ];

    protected $casts = [
        'name' => 'string',
        'is_enable' => 'boolean',
    ];
}
