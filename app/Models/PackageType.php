<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ScopeActiveTrait;

class PackageType extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'title',
        'is_enable'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'title' => 'string',
        'enable'=>'boolean'
    ];
}
