<?php

namespace App\Models;

use App\Traits\ScopeActiveTrait;
use App\Traits\ScopeLatestTrait;
use App\Traits\ScopeVisibleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Blog extends Model
{
    use ScopeActiveTrait,
        ScopeVisibleTrait,
        ScopeLatestTrait,
        HasFactory,
        HasSlug;

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'description',
        'keywords',
        'content',
        'small_content',
        'is_enable',
        'gallery_id',
        'visibility_date_from',
        'visibility_date_to',
        'event_date'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->slugsShouldBeNoLongerThan(240)
            ->saveSlugsTo('slug');
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'visibility_date_from',
        'visibility_date_to',
        'event_date',
    ];

    protected $casts = [
        'is_enable'=>'boolean',
        'gallery_id'=>'integer',
        'event_date'  => 'date:Y-m-d',
    ];

    public function mainImage()
    {
        return $this->morphOne('App\Models\UploadFile', 'imageable');
    }

    public function getFormatedDateAttribute()
    {
        $date =  explode('-', $this->event_date);
        $month = $date['1'];
        $day = $date['2'];

        if($month == 1){
            $month = 'sty';
        }

        if($month == 2){
            $month = 'lyt';
        }

        if($month == 3){
            $month = 'mar';
        }

        if($month == 4){
            $month = 'kwi';
        }

        if($month == 5){
            $month = 'maj';
        }

        if($month == 6){
            $month = 'cze';
        }

        if($month == 7){
            $month = 'lip';
        }

        if($month == 8){
            $month = 'sie';
        }

        if($month == 9){
            $month = 'wrz';
        }

        if($month == 10){
            $month = 'pas';
        }

        if($month == 11){
            $month = 'lis';
        }

        if($month == 12){
            $month = 'gru';
        }

        return "<span class='day'>$day</span>$month";

    }
}
