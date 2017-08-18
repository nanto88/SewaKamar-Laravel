<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->text('description');
            $table->string('image');
            $table->integer('price');
            $table->string('city', 20);
            $table->string('location', 50);
            $table->integer('person');
            $table->boolean('status')->default(1);
            $table->boolean('confirm')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')
                  ->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')
                  ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
