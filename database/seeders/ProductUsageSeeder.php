<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_usage')->insert([
            'profile_name' => 'Bas',
            'date' => '18-03-2021',
            'calories' => 0,
            'alcohol' => 0,
        ]);

        DB::table('product_usage')->insert([
            'profile_name' => 'Bas',
            'date' => '18-03-2021',
            'calories' => 200,
            'alcohol' => 0,
        ]);

        DB::table('product_usage')->insert([
            'profile_name' => 'Bas',
            'date' => '18-03-2021',
            'calories' => 0,
            'alcohol' => 1,
        ]);

        DB::table('product_usage')->insert([
            'profile_name' => 'Bas',
            'date' => '18-03-2021',
            'calories' => 150,
            'alcohol' => 1,
        ]);
    }
}