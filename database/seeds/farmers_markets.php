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
        DB::table('users')->insert([
            'email' => 'lelandlopez@gmail.com',
            'type_account' => '1',
            'password' => bcrypt('waiakea2009'),
        ]);
        DB::table('farmers_markets')->insert([
            'id' => '1',
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
        DB::table('users')->insert([
            'email' => 'vendor1@gmail.com',
            'type_account' => '1',
            'password' => bcrypt('vendor1'),
        ]);
        DB::table('farmers_markets')->insert([
            'id' => '2',
            'user_id' => '2',
            'farmers_market_name' => 'Waipahu District Park (People\'s Open Market)',
            'street_address' => '94-230 Paiwa Street Waipahu, HI',
            'city' => 'Waipahu',
            'zipcode' => '96797',
            'lat' => '21.38803075800047',
            'lng' => '-157.99936985699975',
            'county' => 'Honolulu County',
            'state' => 'Hawaii',
            'country' => 'United States',
            'organizer_name' => 'leland lopez',
            'organizer_phone_number' => '1234567',
        ]);
        DB::table('farmers_market_hours')->insert([
            'farmers_market_id' => '2',
            'day_of_week' => '2',
        ]);
        DB::table('users')->insert([
            'email' => 'vendor2@gmail.com',
            'type_account' => '1',
            'password' => bcrypt('vendor2'),
        ]);
        DB::table('farmers_markets')->insert([
            'id' => '3',
            'user_id' => '2',
            'farmers_market_name' => 'Pokai Bay Beach Park (People\'s Open Market)',
            'street_address' => '85-037 Pokai Bay Road Waianae, HI',
            'city' => 'Waipahu',
            'zipcode' => '96797',
            'lat' => '21.44185853600044',
            'lng' => '-158.18862608699973',
            'county' => 'Honolulu County',
            'state' => 'Hawaii',
            'country' => 'United States',
            'organizer_name' => 'leland lopez',
            'organizer_phone_number' => '1234567',
        ]);
        DB::table('farmers_market_hours')->insert([
            'farmers_market_id' => '3',
            'day_of_week' => '5',
        ]);
        DB::table('users')->insert([
            'email' => 'vendor3@gmail.com',
            'type_account' => '1',
            'password' => bcrypt('vendor3'),
        ]);
        DB::table('farmers_markets')->insert([
            'id' => '4',
            'user_id' => '3',
            'farmers_market_name' => 'Hawaii Kai Farmers\' Market at Kaiser High School',
            'street_address' => '511 Lunalilo Home Road Honolulu, HI',
            'city' => 'Waipahu',
            'zipcode' => '96797',
            'lat' => '21.286071053000455',
            'lng' => '-157.69769887499973',
            'county' => 'Honolulu County',
            'state' => 'Hawaii',
            'country' => 'United States',
            'organizer_name' => 'leland lopez',
            'organizer_phone_number' => '1234567',
        ]);
        DB::table('farmers_market_hours')->insert([
            'farmers_market_id' => '4',
            'day_of_week' => '6',
        ]);
       DB::table('users')->insert([
            'email' => 'vendor4@gmail.com',
            'type_account' => '1',
            'password' => bcrypt('vendor4'),
        ]);
        DB::table('farmers_markets')->insert([
            'id' => '5',
            'user_id' => '4',
            'farmers_market_name' => 'Honolulu Farmers\' Market at Neal S. Blaisdell Center',
            'street_address' => '777 Ward Ave Honolulu, HI 96814',
            'city' => 'Waipahu',
            'zipcode' => '96797',
            'lat' => '21.29999544000043',
            'lng' => '-157.85177574799974',
            'county' => 'Honolulu County',
            'state' => 'Hawaii',
            'country' => 'United States',
            'organizer_name' => 'leland lopez',
            'organizer_phone_number' => '1234567',
        ]); 
        DB::table('farmers_market_hours')->insert([
            'farmers_market_id' => '5',
            'day_of_week' => '3',
        ]);
        DB::table('users')->insert([
            'email' => 'vendor5@gmail.com',
            'type_account' => '1',
            'password' => bcrypt('vendor4'),
        ]);
        DB::table('farmers_markets')->insert([
            'id' => '6',
            'user_id' => '5',
            'farmers_market_name' => 'Maku\'u Farmer\'s Market',
            'street_address' => '15-2131 Keaau-Pahoa Rd, Pāhoa, HI 96778',
            'city' => 'Waipahu',
            'zipcode' => '96797',
            'lat' => '19.539409',
            'lng' => '-154.968638',
            'county' => 'Hawaii County',
            'state' => 'Hawaii',
            'country' => 'United States',
            'organizer_name' => 'leland lopez',
            'organizer_phone_number' => '1234567',
        ]); 
        DB::table('farmers_market_hours')->insert([
            'farmers_market_id' => '6',
            'day_of_week' => '7',
        ]);
        DB::table('users')->insert([
            'email' => 'vendor6@gmail.com',
            'type_account' => '1',
            'password' => bcrypt('vendor4'),
        ]);
        DB::table('farmers_markets')->insert([
            'id' => '7',
            'user_id' => '5',
            'farmers_market_name' => 'Kona Sunset Farmers Market',
            'street_address' => '15-2131 Keaau-Pahoa Rd, Pāhoa, HI 96778',
            'city' => 'Waipahu',
            'zipcode' => '96797',
            'lat' => '19.652920',
            'lng' => '-155.998949',
            'county' => 'Hawaii County',
            'state' => 'Hawaii',
            'country' => 'United States',
            'organizer_name' => 'leland lopez',
            'organizer_phone_number' => '1234567',
        ]); 
        DB::table('farmers_market_hours')->insert([
            'farmers_market_id' => '7',
            'day_of_week' => '3',
        ]);
        DB::table('farmers_market_hours')->insert([
            'farmers_market_id' => '7',
            'day_of_week' => '4',
        ]);
        DB::table('farmers_market_hours')->insert([
            'farmers_market_id' => '7',
            'day_of_week' => '5',
        ]);
        DB::table('farmers_market_hours')->insert([
            'farmers_market_id' => '7',
            'day_of_week' => '6',
        ]);
        DB::table('farmers_market_hours')->insert([
            'farmers_market_id' => '7',
            'day_of_week' => '7',
        ]);
        DB::table('users')->insert([
            'email' => 'vendor7@gmail.com',
            'type_account' => '1',
            'password' => bcrypt('vendor4'),
        ]);
        DB::table('farmers_markets')->insert([
            'id' => '8',
            'user_id' => '6',
            'farmers_market_name' => 'Fort Street near Wilcox Park',
            'street_address' => '',
            'city' => 'Waipahu',
            'zipcode' => '96797',
            'lat' => '21.304850435000446',
            'lng' => '-157.85774940299973',
            'county' => 'Honolulu County',
            'state' => 'Hawaii',
            'country' => 'United States',
            'organizer_name' => 'leland lopez',
            'organizer_phone_number' => '1234567',
        ]); 
        DB::table('farmers_market_hours')->insert([
            'farmers_market_id' => '8',
            'day_of_week' => '2',
        ]);
    }
}
