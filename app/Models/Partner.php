<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\ScopeActiveTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory,
        ScopeActiveTrait,
        SoftDeletes;

    protected $fillable = [
        'name',
        'is_enable',
        'position',
        'file_name'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'is_enable' => 'boolean',
        'name' => 'string',
        'position' => 'integer',
        'file_name' => 'string',
    ];
}
