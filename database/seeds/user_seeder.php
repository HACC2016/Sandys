<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'farmers_market_name' => 'leland lopez',
            'street_address' => 'street_address',
            'city' => 'city',
            'zipcode' => '96818',
            'organizer_name' => 'leland lopez',
            'organizer_phone_number' => '1234567',
            'email' => 'lelandlopez@gmail.com',
            'password' => bcrypt('waiakea2009'),
        ]);
    }
}
