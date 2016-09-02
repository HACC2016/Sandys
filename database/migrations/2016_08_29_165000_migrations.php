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
            $table->integer('user_id')->unsigned()->nullable();
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
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('vendor_name');
            $table->string('vendor_owner_name');
            $table->string('vendor_owner_phone');
            $table->string('website');
            $table->timestamps();
        });
        Schema::create('farmers_market_vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->integer('farmers_market_id')->unsigned();
            $table->foreign('farmers_market_id')->references('id')->on('farmers_markets');
            $table->timestamps();
        });
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reviewer_id')->unsigned();
            $table->foreign('reviewer_id')->references('id')->on('users');
            $table->integer('reviewed_id')->unsigned();
            $table->foreign('reviewed_id')->references('id')->on('users');
            $table->string('review');
            $table->integer('rating');
            $table->timestamps();
        });
        Schema::create('patrons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('username');
            $table->timestamps();
        });
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poster_id')->unsigned();
            $table->foreign('poster_id')->references('id')->on('users');
            $table->string('filename');
            $table->string('mime');
            $table->string('original_filename');
            $table->string('caption');
            $table->timestamps();
        });
        Schema::create('follows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('follower_id')->unsigned();
            $table->foreign('follower_id')->references('id')->on('users');
            $table->integer('followed_id')->unsigned();
            $table->foreign('followed_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('message');
            $table->timestamps();
        });
        Schema::create('post_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->timestamps();
        });
        Schema::create('vendor_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->integer('photo_id')->unsigned();
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->string('item');
            $table->string('description');
            $table->decimal('price', 10, 2);
            $table->integer('price_per');
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
        Schema::drop('farmers_market_vendors');
        Schema::drop('follows');
        Schema::drop('post_likes');
        Schema::drop('posts');
        Schema::drop('reviews');
        Schema::drop('farmers_markets');
        Schema::drop('password_resets');
        Schema::drop('patrons');
        Schema::drop('vendor_items');
        Schema::drop('photos');
        Schema::drop('vendors');
        Schema::drop('users');
    }
}
