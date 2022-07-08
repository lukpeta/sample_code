<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ScopeActiveTrait;

class CompanyPackage extends Model
{
    use HasFactory,
        ScopeActiveTrait;

    protected $fillable = [
        'title',
        'description',
        'position',
        'is_enable'
    ];

    protected $casts = [
        'title' =>'string',
        'description' =>'string',
        'position' =>'integer',
        'is_enable' =>'boolean'
    ];
}
