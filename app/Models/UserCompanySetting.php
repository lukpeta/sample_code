<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompanySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'settings'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'settings' => 'array'
    ];
}
