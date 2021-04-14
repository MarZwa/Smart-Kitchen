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
            'rfid' => '0xF9 0x25 0x88 0x9C',
        ]);

        DB::table('users')->insert([
            'name' => 'Jamal',
            'rfid' => '0x9C 0x5F 0x47 0x18',
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
