<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ScopeActiveTrait;
use App\Traits\ScopeVisibleTrait;

class Slide extends Model
{
    use HasFactory,
        ScopeActiveTrait,
        ScopeVisibleTrait;

    protected $fillable = [
        'is_enable',
        'type',
        'line1',
        'line2',
        'url',
        'position',
        'visibility_date_from',
        'visibility_date_to',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'position' => 'integer',
        'company_id' => 'integer',
        'enable'=>'boolean',
        'type'=>'boolean'
    ];

    public function mainImage()
    {
        return $this->morphOne('App\Models\UploadFile', 'imageable');
    }

}
