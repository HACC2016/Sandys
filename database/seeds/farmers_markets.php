<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class farmers_markets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('farmers_markets')->insert([
        	'user_id' => '1',
            'farmers_market_name' => 'leland lopez',
            'street_address' => '920 puku street',
            'city' => 'Hilo',
            'zipcode' => '96720',
            'lat' => '19.676747',
            'lng' => '-155.099217',
            'county' => 'Hawaii County',
            'state' => 'Hawaii',
            'country' => 'United States',
            'zipcode' => '96720',
            'organizer_name' => 'leland lopez',
            'organizer_phone_number' => '1234567',
        ]);
        DB::table('farmers_markets')->insert([
            'user_id' => '2',
            'farmers_market_name' => 'qwer qwer',
            'street_address' => '920 puku street',
            'city' => 'Hilo',
            'zipcode' => '96720',
            'lat' => '19.90',
            'lng' => '-155.099217',
            'county' => 'Hawaii County',
            'state' => 'Hawaii',
            'country' => 'United States',
            'zipcode' => '96720',
            'organizer_name' => 'leland lopez',
            'organizer_phone_number' => '1234567',
        ]);
    }
}
