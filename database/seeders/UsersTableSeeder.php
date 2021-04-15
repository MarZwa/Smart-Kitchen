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
            'name' => 'Max',
            'rfid' => '8CE95423',
        ]);

        DB::table('users')->insert([
            'name' => 'Bas',
            'rfid' => '2354EA38',
        ]);

        DB::table('users')->insert([
            'name' => 'Marc',
            'rfid' => '040CA38AE56081',
        ]);

        DB::table('users')->insert([
            'name' => 'Jim',
            'rfid' => '0423FE8AE56081',
        ]);
    }
}
