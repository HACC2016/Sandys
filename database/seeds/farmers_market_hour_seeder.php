<?php

use Illuminate\Database\Seeder;

class farmers_market_hour_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('farmers_market_hours')->insert([
            'user_id' => '1',
            'day_of_week' => '1',
            'start_time_hour' => '6',
            'start_time_min' => '15',
            'start_time_period' => '1',
            'end_time_hour' => '4',
            'end_time_min' => '45',
            'end_time_period' => '2',
        ]);
    }
}
