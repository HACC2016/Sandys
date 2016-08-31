<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Migrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('type_account');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('farmers_markets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('farmers_market_name');
            $table->string('street_address');
            $table->string('city');
            $table->string('zipcode');
            $table->string('lat');
            $table->string('lng');
            $table->string('state');
            $table->string('county');
            $table->string('country');
            $table->string('organizer_name');
            $table->string('organizer_phone_number');
            $table->string('website');
            $table->timestamps();
        });
        Schema::create('farmers_market_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('farmers_market_id')->unsigned();
            $table->foreign('farmers_market_id')->references('id')->on('farmers_markets');
            $table->integer('day_of_week');
            $table->integer('start_time_hour');
            $table->integer('start_time_min');
            $table->integer('start_time_period');
            $table->integer('end_time_hour');
            $table->integer('end_time_min');
            $table->integer('end_time_period');
            $table->timestamps();
        });
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });
        Schema::create('farmers_market_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('farmers_market_id')->unsigned();
            $table->foreign('farmers_market_id')->references('id')->on('farmers_markets');
            $table->string('review');
            $table->integer('rating');
            $table->timestamps();
        });
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('vendor_name');
            $table->string('vendor_owner_name');
            $table->string('vendor_owner_phone');
            $table->string('website');
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
        Schema::drop('farmers_market_hours');
        Schema::drop('farmers_market_reviews');
        Schema::drop('farmers_markets');
        Schema::drop('password_resets');
        Schema::drop('vendors');
        Schema::drop('users');
    }
}
