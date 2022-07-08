<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Traits\ScopeActiveTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        ScopeActiveTrait,
        HasRoles,
        HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['id'])
            ->slugsShouldBeNoLongerThan(240)
            ->saveSlugsTo('slug');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'phone',
        'street',
        'building_number',
        'city',
        'postal_code',
        'shipping_default_inpost_parcel',
        'revicer_default_inpost_parcel',
        'file_name',
        'is_enable',
        'is_company',
        'email_verified_at',
        'is_two_step_authorization',
        'two_step_authorization_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'surname' => 'string',
        'phone' => 'string',
        'street' => 'string',
        'building_number' => 'string',
        'city' => 'string',
        'postal_code' => 'string',
        'shipping_default_inpost_parcel' => 'string',
        'revicer_default_inpost_parcel' => 'string',
        'file_name' => 'string',
        'is_enable' => 'boolean',
        'is_company' => 'boolean',
        'is_two_step_authorization' => 'boolean',
        'two_step_authorization_token' => 'string',
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function loginHistory()
    {
        return $this->hasMany(UserLoginHistory::class);
    }

    public function mainImage()
    {
        return $this->morphOne('App\Models\UploadFile', 'imageable');
    }

    public function companyDetails()
    {
        return $this->hasOne(UserCompanySetting::class);
    }

    public function isCompany(): bool
    {
        return $this->is_company == true;
    }
}
