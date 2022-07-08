<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\ScopeActiveTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parcel extends Model
{
    use HasFactory,
        ScopeActiveTrait,
        SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [
        'package_sender_id',
        'package_revicer_id',
        'package_id',
        'package_type',
        'price',
        'shipment_date',
        'sender_name',
        'sender_surname',
        'sender_phone',
        'sender_email',
        'sender_street',
        'sender_city',
        'sender_postal_code',
        'sender_inpost_parcel_locker',
        'revicer_name',
        'revicer_surname',
        'revicer_phone',
        'revicer_email',
        'revicer_street',
        'revicer_city',
        'revicer_postal_code',
        'revicer_inpost_parcel_locker',
        'type_of_delivery',
        'shipping_method',
        'size_of_shipment',
        'shipment_value',
        'content',
        'is_paid',
        'sms_send_date'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'shipment_date',
        'sms_send_date',
    ];

    protected $casts = [
        'package_sender_id' =>'integer',
        'package_revicer_id' =>'integer',
        'package_id' =>'integer',
        'package_type' =>'string',
        'price' =>'decimal:<12,2>',
        'shipment_date' =>'string',
        'sender_name' =>'string',
        'sender_surname' =>'string',
        'sender_phone' =>'string',
        'sender_email' =>'string',
        'sender_street' =>'string',
        'sender_city' =>'string',
        'sender_postal_code' =>'string',
        'sender_inpost_parcel_locker' =>'string',
        'revicer_name' =>'string',
        'revicer_surname' =>'string',
        'revicer_phone' =>'string',
        'revicer_email' =>'string',
        'revicer_street' =>'string',
        'revicer_city' =>'string',
        'revicer_postal_code' =>'string',
        'revicer_inpost_parcel_locker' =>'string',
        'type_of_delivery' =>'string',
        'shipping_method' =>'string',
        'size_of_shipment' =>'string',
        'shipment_value' =>'string',
        'content' =>'string',
        'is_paid' =>'boolean',
        'sms_send_date' =>'date',
    ];
}
