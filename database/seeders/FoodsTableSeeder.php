<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            'name' => 'Aanbevolen',
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
