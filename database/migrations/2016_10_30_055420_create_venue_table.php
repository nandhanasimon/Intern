<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vname');
            $table->integer('mobileno');
            $table->string('category');
            $table->string('address');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('city');
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
        Schema::drop('venue');
    }
}
