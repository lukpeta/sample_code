<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'user_id',
        'ip',
        'session_id',
        'amount',
        'currency',
        'description',
        'email',
        'client',
        'sign',
        'operation_status',
        'price_list_id',
        'price_list_option',
        'is_return_package',
        'payment_parcel'
    ];

    protected $guarded = ['id'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'ip' => 'string',
        'session_id' => 'string',
        'amount' => 'string',
        'currency' => 'string',
        'description' => 'string',
        'email' => 'string',
        'client' => 'string',
        'sign' => 'string',
        'operation_status' => 'string',
        'price_list_id' => 'integer',
        'price_list_option' => 'integer',
        'is_return_package' => 'boolean',
        'is_payment_parcel' => 'boolean',
    ];
}
