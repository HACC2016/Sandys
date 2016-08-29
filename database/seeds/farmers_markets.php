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
            'street_address' => 'street_address',
            'city' => 'city',
            'zipcode' => '96818',
            'organizer_name' => 'leland lopez',
            'organizer_phone_number' => '1234567',
        ]);
    }
}
