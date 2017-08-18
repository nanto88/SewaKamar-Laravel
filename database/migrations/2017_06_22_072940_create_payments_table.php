<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_type');
            $table->string('payment_date');
            $table->integer('amount');
            $table->integer('user_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->integer('reservation_id')->unsigned();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')
                  ->on('users');
            $table->foreign('room_id')->references('id')
                  ->on('rooms');
            $table->foreign('reservation_id')->references('id')
                  ->on('reservations');
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
}
