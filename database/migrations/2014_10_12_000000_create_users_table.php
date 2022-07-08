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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('building_number')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('shipping_default_inpost_parcel', 10)->nullable();
            $table->string('revicer_default_inpost_parcel', 10)->nullable();
            $table->string('file_name')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('two_step_authorization_token')->nullable();
            $table->boolean('is_two_step_authorization')->default(false);
            $table->boolean('is_enable')->default(false);
            $table->boolean('is_company')->default(false);
            $table->string('slug');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
