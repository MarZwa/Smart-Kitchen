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
            'name' => 'Bas',
            'rfid' => 'F925889C',
        ]);

        DB::table('users')->insert([
            'name' => 'Jamal',
            'rfid' => '9C5F4718',
        ]);

        DB::table('users')->insert([
            'name' => 'Jim',
        ]);

        DB::table('users')->insert([
            'name' => 'Marc',
        ]);

        DB::table('users')->insert([
            'name' => 'Max',
        ]);
    }
}
