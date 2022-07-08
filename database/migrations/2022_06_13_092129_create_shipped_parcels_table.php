<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipped_parcels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('receiver_city')->nullable();
            $table->string('receiver_post_code')->nullable();
            $table->string('receiver_country_code')->nullable();
            $table->string('receiver_street')->nullable();
            $table->string('receiver_building_number')->nullable();
            $table->string('receiver_phone')->nullable();
            $table->string('receiver_email')->nullable();
            $table->string('receiver_first_name')->nullable();
            $table->string('receiver_last_name')->nullable();
            $table->string('receiver_company_name')->nullable();
            $table->string('receiver_address')->nullable();
            $table->string('sender_city')->nullable();
            $table->string('sender_post_code')->nullable();
            $table->string('sender_country_code')->nullable();
            $table->string('sender_street')->nullable();
            $table->string('sender_building_number')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('sender_first_name')->nullable();
            $table->string('sender_last_name')->nullable();
            $table->string('sender_address')->nullable();
            $table->boolean('is_return')->default(false);
            $table->integer('shipping_method')->default(0);
            $table->integer('package_type')->default(0);
            $table->integer('package_size')->default(0);
            $table->integer('shipping_company')->default(0);
            $table->mediumText('order_description')->nullable();
            $table->string('order_sending_parcel')->nullable();
            $table->string('order_recipient_parcel')->nullable();
            $table->string('inpost_shipment_id')->nullable();
            $table->string('inpost_tracking_number')->nullable();
            $table->string('inpost_parcel_height')->nullable();
            $table->string('inpost_parcel_length')->nullable();
            $table->string('inpost_parcel_width')->nullable();
            $table->string('inpost_label_file_name')->nullable();
            $table->string('payment_token')->nullable();
            $table->ipAddress('ip');
            $table->boolean('is_return_customer')->default(0);
            $table->boolean('is_payment_shipment')->default(false);
            $table->boolean('payment_status')->default(false);
            $table->boolean('inpost_is_non_standard')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipped_parcels');
    }
};
