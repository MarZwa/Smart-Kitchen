<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GroceryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grocery')->insert([
            'product_name' => 'Smarties - Nestlé - 38g',
            'user_name' => 'Max',
        ]);

        DB::table('grocery')->insert([
            'product_name' => 'Original - Pringles - 165 g',
            'user_name' => 'Bas',
        ]);
    }
}
