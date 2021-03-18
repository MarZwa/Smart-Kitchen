<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile')->insert([
            'name' => 'Bas',
            'CG' => 2500,
            'AG' => 3,
        ]);

        DB::table('profile')->insert([
            'name' => 'Max',
            'CG' => 2000,
            'AG' => 4,
        ]);

        DB::table('profile')->insert([
            'name' => 'Marc',
            'CG' => 2200,
            'AG' => 12,
        ]);

        DB::table('profile')->insert([
            'name' => 'Jim',
            'CG' => 2500,
            'AG' => 9,
        ]);

        DB::table('profile')->insert([
            'name' => 'Jamal',
            'CG' => 2300,
            'AG' => 6,
        ]);
    }
}
