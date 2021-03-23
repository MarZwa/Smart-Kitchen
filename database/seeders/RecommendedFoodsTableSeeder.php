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
            'groente' => '250 g',
            'fruit' => '200 g',
            'brood' => '6 st',  
            'graanpr/aardappelen' => '240 g', 
            'vis' => '250 g', 
            'peulvruchten' => '135 g', 
            'vlees' => '500 g', 
            'ei' => '2 st', 
            'noten' => '25 g', 
            'melk(producten)' => '300 g', 
            'kaas' => '40 g', 
            'vetten' => '65 g',             
        ]);
    }
}
