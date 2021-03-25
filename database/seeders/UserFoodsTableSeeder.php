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
            'name' => 'Marc',
            'groente' => 14,
            'fruit' => 0,
            'brood' => 0,  
            'graanpr/aardappelen' => 0, 
            'vis' => 0, 
            'peulvruchten' => 0, 
            'vlees' => 0, 
            'ei' => 0, 
            'noten' => 0, 
            'melk(producten)' => 0, 
            'kaas' => 0, 
            'vetten' => 0,
        ]);
    }
}
