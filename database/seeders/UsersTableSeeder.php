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
            'rfid' => '1216720222',
            'name' => 'Marc',
        ]);

        DB::table('users')->insert([
            'rfid' => '2171383194',
            'name' => 'Jim',
        ]);

        DB::table('users')->insert([
            'rfid' => '163243293',
            'name' => 'Jamal',
        ]);

        DB::table('users')->insert([
            'name' => 'Bas',
        ]);

        DB::table('users')->insert([
            'name' => 'Max',
        ]);
    }
}
