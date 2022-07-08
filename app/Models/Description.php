<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ScopeActiveTrait;

class Description extends Model
{
    use HasFactory,
        ScopeActiveTrait;

    protected $fillable = [
        'key',
        'content'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'key' =>'string',
        'content' =>'string',
    ];
}
