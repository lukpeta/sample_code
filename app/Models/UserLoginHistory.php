<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoginHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i ',
    ];
}
