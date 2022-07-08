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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->ipAddress('ip');
            $table->string('session_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency', 6)->nullable();
            $table->string('description')->nullable();
            $table->string('email')->nullable();
            $table->string('client')->nullable();
            $table->text('sign')->nullable();
            $table->string('operation_status', 25)->nullable();
            $table->bigInteger('price_list_id');
            $table->bigInteger('price_list_option');
            $table->boolean('is_payment_parcel')->default(false);
            $table->boolean('is_return_package')->default(false);
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
        Schema::dropIfExists('payments');
    }
};
