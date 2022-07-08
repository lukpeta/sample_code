<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippedParcel extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'user_id',
        'receiver_city',
        'receiver_post_code',
        'receiver_country_code',
        'receiver_street',
        'receiver_building_number',
        'receiver_phone',
        'receiver_email',
        'receiver_first_name',
        'receiver_last_name',
        'receiver_company_name',
        'receiver_address',
        'sender_city',
        'sender_post_code',
        'sender_country_code',
        'sender_street',
        'sender_building_number',
        'sender_phone',
        'sender_email',
        'sender_first_name',
        'sender_last_name',
        'sender_address',
        'is_return',
        'shipping_method',
        'package_type',
        'package_size',
        'shipping_company',
        'order_description',
        'order_sending_parcel',
        'order_recipient_parcel',
        'inpost_shipment_id',
        'inpost_tracking_number',
        'inpost_is_non_standard',
        'inpost_parcel_height',
        'inpost_parcel_length',
        'inpost_parcel_width',
        'inpost_label_file_name',
        'is_return_customer',
        'is_payment_shipment',
        'payment_status',
        'payment_token',
        'ip',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'is_return'=>'boolean',
        'user_id'=>'integer',
        'is_return'=>'boolean',
        'shipping_method'=>'integer',
        'package_type'=>'integer',
        'package_size'=>'integer',
        'shipping_company'=>'integer',
        'inpost_is_non_standard'=>'integer',
        'is_payment_shipment'=>'integer',
        'payment_status'=>'integer'
    ];
}
