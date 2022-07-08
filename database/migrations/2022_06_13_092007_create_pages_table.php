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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 155);
            $table->string('description', 155)->nullable();
            $table->string('keywords', 155)->nullable();
            $table->longText('content')->nullable();
            $table->date('visibility_date_from');
            $table->date('visibility_date_to');
            $table->boolean('is_enable')->default(false);
            $table->boolean('is_system')->default(false);
            $table->string('slug');
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
        Schema::dropIfExists('pages');
    }
};
