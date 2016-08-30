<?php

use Illuminate\Database\Seeder;

class farmer_market_review_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('farmers_market_reviews')->insert([
            'user_id' => '1',
            'farmers_market_id' => '1',
            'review' => 'Pretty good',
            'rating' => '3',
        ]);
    }
}
