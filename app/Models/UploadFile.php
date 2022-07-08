<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ScopeActiveTrait;

class UploadFile extends Model
{
    use HasFactory,
        ScopeActiveTrait;

    protected $fillable = [
        'is_enable',
        'file_type',
        'file_id',
        'path',
        'ip',
        'position',
        'description',
        'extension',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'file_id' => 'integer',
        'position' => 'integer',
        'is_enable'=>'boolean'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function url()
    {
        return Storage::url($this->path);
    }
}
