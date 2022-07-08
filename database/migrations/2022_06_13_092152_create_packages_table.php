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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_type_id')->constrained('package_types')->onDelete('cascade');
            $table->string('name');
            $table->decimal('price', 12, 2)->default(0);
            $table->integer('quantityA')->default(0);
            $table->integer('quantityB')->default(0);
            $table->integer('quantityC')->default(0);
            $table->integer('sms')->default(0);
            $table->integer('position')->default(0);
            $table->boolean('is_enable')->default(false);
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
        Schema::dropIfExists('packages');
    }
};
