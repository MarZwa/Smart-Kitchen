<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserFoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_foods')->insert([
            'name' => 'Marc'
        ]);
    }
}
