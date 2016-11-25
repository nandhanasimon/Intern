<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guestlist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guest_name');
            $table->integer('event_id')->unsigned();
            //$table->foreign('event_id')->references('id')->on('events');
            $table->string('phnumber');
            $table->string('no_of_couples');
            $table->timestamps();
        });



       Schema::table('guestlist', function($table) {
       $table->foreign('event_id')->references('id')->on('events');
    });

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guestlist');
    }
}
