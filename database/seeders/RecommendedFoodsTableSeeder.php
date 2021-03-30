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
            'food' => 'groente',
            'amount' => 250, 
            'repeat' => 'daily',           
        ]);

        DB::table('recommended_foods')->insert([
            'food' => 'fruit',
            'amount' => 200,  
            'repeat' => 'daily',           
        ]);

        DB::table('recommended_foods')->insert([
            'food' => 'brood',
            'amount' => 6,   
            'repeat' => 'daily',          
        ]);

        DB::table('recommended_foods')->insert([
            'food' => 'aardappelen/graanpr',
            'amount' => 240, 
            'repeat' => 'daily',            
        ]);

        DB::table('recommended_foods')->insert([
            'food' => 'vis',
            'amount' => 100, 
            'repeat' => 'weekly',            
        ]);

        DB::table('recommended_foods')->insert([
            'food' => 'peulvruchten',
            'amount' => 135,  
            'repeat' => 'weekly',           
        ]);

        DB::table('recommended_foods')->insert([
            'food' => 'vlees',
            'amount' => 500, 
            'repeat' => 'weekly',            
        ]);

        DB::table('recommended_foods')->insert([
            'food' => 'ei',
            'amount' => 2,  
            'repeat' => 'weekly',           
        ]);

        DB::table('recommended_foods')->insert([
            'food' => 'noten',
            'amount' => 25, 
            'repeat' => 'daily',            
        ]);

        DB::table('recommended_foods')->insert([
            'food' => 'melk(producten)',
            'amount' => 300, 
            'repeat' => 'daily',            
        ]);

        DB::table('recommended_foods')->insert([
            'food' => 'kaas',
            'amount' => 40, 
            'repeat' => 'daily',            
        ]);

        DB::table('recommended_foods')->insert([
            'food' => 'vetten',
            'amount' => 65, 
            'repeat' => 'daily',
            'description' => 'Smeer- en bereidingsvetten zoals boter, olijfolie, etc.'            
        ]);
    }
}
