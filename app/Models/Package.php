<?php

namespace App\Models;

use App\Traits\ScopeActiveTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use ScopeActiveTrait,
        SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'price',
        'quantityA',
        'quantityB',
        'quantityC',
        'sms',
        'is_enable',
        'position',
        'company_package_id',
        'package_type_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'name' =>'string',
        'price' =>'string',
        'quantityA' =>'string',
        'quantityB' =>'string',
        'quantityC' =>'string',
        'sms' =>'integer',
        'is_enable' =>'boolean',
        'position' =>'boolean',
        'company_package_id' =>'integer',
        'package_type_id' =>'integer',
    ];
}
