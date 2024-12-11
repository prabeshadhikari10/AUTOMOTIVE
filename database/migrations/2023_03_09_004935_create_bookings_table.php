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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('user_id')->on('vehicles');
            $table->string('from_date');
            $table->string('to_date');
            $table->integer('booking_day')->default(2);
            $table->text('pick_drop');
            $table->enum('status',['pending','rejected','active','completed','canceled'])->default('pending');
            $table->enum('payment',['unpaid','paid', 'cash in hand'])->default('unpaid');
            $table->double('price');
            $table->integer('total_price');
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
        Schema::dropIfExists('bookings');
    }
};
