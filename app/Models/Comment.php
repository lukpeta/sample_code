<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ScopeActiveTrait;
use App\Traits\ScopeVisibleTrait;

class Comment extends Model
{
    use HasFactory,
        ScopeActiveTrait,
        ScopeVisibleTrait;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'content',
        'is_enable',
        'visibility_date_from',
        'visibility_date_to'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'visibility_date_from',
        'visibility_date_to'
    ];

    protected $casts = [
        'name' =>'string',
        'author' =>'string',
        'content' =>'string',
        'is_enable' =>'boolean',
        'visibility_date_from' =>'date',
        'visibility_date_to' =>'date'
    ];
}
