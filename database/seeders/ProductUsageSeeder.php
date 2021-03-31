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
            'user_name' => 'Bas',
            'date' => Carbon::today()->format('d-m-Y'),
            'calories' => 0,
            'alcohol' => 0,
        ]);

        DB::table('product_usage')->insert([
            'user_name' => 'Bas',
            'date' => Carbon::today()->format('d-m-Y'),
            'calories' => 200,
            'alcohol' => 0,
        ]);

        DB::table('product_usage')->insert([
            'user_name' => 'Bas',
            'date' => Carbon::today()->format('d-m-Y'),
            'calories' => 0,
            'alcohol' => 1,
        ]);

        DB::table('product_usage')->insert([
            'user_name' => 'Bas',
            'date' => Carbon::today()->format('d-m-Y'),
            'calories' => 150,
            'alcohol' => 1,
        ]);
    }
}