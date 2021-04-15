<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

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
            'name' => 'Something',
            'user_name' => 'Bas',
            'calories' => 0,
            'alcohol' => 0,
            'date' => Carbon::today()->format('d-m-Y'),
        ]);

        DB::table('product_usage')->insert([
            'name' => 'Something',
            'user_name' => 'Bas',
            'calories' => 200,
            'alcohol' => 0,
            'date' => Carbon::today()->format('d-m-Y'),
        ]);

        DB::table('product_usage')->insert([
            'name' => 'Something',
            'user_name' => 'Bas',
            'calories' => 0,
            'alcohol' => 1,
            'date' => Carbon::today()->format('d-m-Y'),
        ]);

        DB::table('product_usage')->insert([
            'name' => 'Something',
            'user_name' => 'Bas',
            'calories' => 150,
            'alcohol' => 1,
            'date' => Carbon::today()->format('d-m-Y'),
        ]);
    }
}