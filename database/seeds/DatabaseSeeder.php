<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(user_seeder::class);
        $this->call(farmers_markets::class);
        $this->call(farmers_market_hour_seeder::class);
        $this->call(farmer_market_review_seeder::class);
    }
}
