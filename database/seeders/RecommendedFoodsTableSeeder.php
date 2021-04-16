<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RecommendedFoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recommended_foods')->insert([
            'groente' => 250,
            'fruit' => 200,
            'brood' => 6,
            'aardappelen' => 240,
            'vis' => 100,
            'peulvruchten' => 135,
            'vlees' => 500,
            'ei' => 2,
            'noten' => 25,
            'melk' => 300,
            'kaas' => 40,
            'vetten' => 65,
        ]);
    }
}
