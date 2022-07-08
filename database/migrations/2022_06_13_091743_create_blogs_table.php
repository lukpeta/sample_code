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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description', 155);
            $table->string('keywords', 155);
            $table->string('small_content');
            $table->string('content')->nullable();
            $table->integer('gallery_id')->default(0);
            $table->date('visibility_date_from');
            $table->date('visibility_date_to');
            $table->date('event_date');
            $table->boolean('is_enable')->default(false);
            $table->string('slug');
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
        Schema::dropIfExists('blogs');
    }
};
