<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ScopeActiveTrait;

class Country extends Model
{
    use HasFactory,
        ScopeActiveTrait;

    protected $fillable = [
        'name',
        'is_enable'
    ];

    protected $casts = [
        'name' =>'string',
        'is_enable' =>'boolean'
    ];
}
