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
            'email' => 'lelandlopez@gmail.com',
            'type_account' => '1',
            'password' => bcrypt('waiakea2009'),
        ]);
        DB::table('users')->insert([
            'email' => 'qwerqwer@gmail.com',
            'type_account' => '1',
            'password' => bcrypt('qwerqewr'),
        ]);
    }
}
