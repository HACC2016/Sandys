<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmersMarketHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers_market_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('day_of_week');
            $table->integer('start_time_hour');
            $table->integer('start_time_min');
            $table->integer('start_time_period');
            $table->integer('end_time_hour');
            $table->integer('end_time_min');
            $table->integer('end_time_period');
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
        Schema::dropIfExists('farmers_market_hours');
        Schema::dropIfExists('users');
    }
}
