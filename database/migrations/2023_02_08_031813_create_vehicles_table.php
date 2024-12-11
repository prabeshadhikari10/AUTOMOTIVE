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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('image')->nullable();
            $table->integer('price');
            $table->string('wheels');
            $table->string('fuel');
            $table->string('engine');
            $table->string('description');
            $table->string('vehicle_no');
            $table->string('location');
            $table->string('driver_stat');
            $table->integer('status')->default('0')->comment('0=visible, 1=hidden');
            $table->integer('trending')->default('0')->comment('0=not-trending, 1=trending');
            $table->string('brand');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('vehicles');
    }
};
