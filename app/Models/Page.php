<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ScopeActiveTrait;
use App\Traits\ScopeVisibleTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasFactory,
        ScopeActiveTrait,
        HasSlug,
        ScopeVisibleTrait,
        SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'description',
        'keywords',
        'content',
        'is_enable',
        'is_system',
        'slug',
        'visibility_date_from',
        'visibility_date_to',
    ];

    protected $with = ['mainImage'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'visibility_date_from',
        'visibility_date_to',
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'keywords' => 'string',
        'content' => 'string',
        'is_enable' => 'boolean',
        'is_system' => 'boolean',
        'visibility_date_from' => 'date',
        'visibility_date_to' => 'date',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->slugsShouldBeNoLongerThan(240)
            ->saveSlugsTo('slug');
    }

    public function mainImage()
    {
        return $this->morphOne('App\Models\UploadFile', 'imageable');
    }
}
