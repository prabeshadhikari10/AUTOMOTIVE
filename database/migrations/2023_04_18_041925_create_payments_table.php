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
            $table->string('payment_id');
            $table->integer('amount');
            $table->dateTime('paid_at');
            $table->string('payer_name');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('owner_id')->on('bookings');
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('vehicle_id')->on('bookings');
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('bookings');
            $table->integer('comission_amount')->nullable();
            $table->integer('release_amount')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
