<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'rfid' => '2C 51 4E 23',
            'name' => 'Bas',
            'calories' => 2500,
            'alcohol' => 3,
            'current_calories' => 0,
            'current_alcohol' => 0,
        ]);

        DB::table('users')->insert([
            'rfid' => '12 28 6A 2D',
            'name' => 'Max',
            'calories' => 2000,
            'alcohol' => 4,
            'current_calories' => 0,
            'current_alcohol' => 0,
        ]);

        DB::table('users')->insert([
            'name' => 'Marc',
            'calories' => 2200,
            'alcohol' => 12,
            'current_calories' => 0,
            'current_alcohol' => 0,
        ]);

        DB::table('users')->insert([
            'name' => 'Jim',
            'calories' => 2500,
            'alcohol' => 9,
            'current_calories' => 0,
            'current_alcohol' => 0,
        ]);

        DB::table('users')->insert([
            'name' => 'Jamal',
            'calories' => 2300,
            'alcohol' => 6,
            'current_calories' => 0,
            'current_alcohol' => 0,
        ]);
    }
}
