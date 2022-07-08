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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_sender_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('package_revicer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('package_id')->constrained('packages');
            $table->string('package_type', 50)->default('inpost - paczkomat');
            $table->decimal('price', 12, 2);
            $table->date('shipment_date');
            $table->string('sender_name');
            $table->string('sender_surname');
            $table->string('sender_phone')->nullable();
            $table->string('sender_email');
            $table->string('sender_street')->nullable();
            $table->string('sender_city')->nullable();
            $table->string('sender_postal_code')->nullable();
            $table->string('sender_inpost_parcel_locker')->nullable();
            $table->string('revicer_name');
            $table->string('revicer_surname');
            $table->string('revicer_phone')->nullable();
            $table->string('revicer_email');
            $table->string('revicer_street')->nullable();
            $table->string('revicer_city')->nullable();
            $table->string('revicer_postal_code')->nullable();
            $table->string('revicer_inpost_parcel_locker')->nullable();
            $table->string('type_of_delivery')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('size_of_shipment')->nullable();
            $table->string('shipment_value')->nullable();
            $table->longText('content')->nullable();
            $table->date('sms_send_date')->nullable();
            $table->boolean('is_paid')->default(false);
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
        Schema::dropIfExists('parcels');
    }
};
