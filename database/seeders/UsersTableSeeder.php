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
            'rfid' => '8C:E9:54:23',
            'scanned' => 'No'
        ]);

        DB::table('users')->insert([
            'name' => 'Bas',
            'rfid' => '23:54:EA:38',
            'scanned' => 'No'
        ]);

        DB::table('users')->insert([
            'name' => 'Marc',
            'rfid' => '04:0C:A3:8A:E5:60:81',
            'scanned' => 'No'
        ]);

        DB::table('users')->insert([
            'name' => 'Jim',
            'rfid' => '04:23:FE:8A:E5:60:81',
            'scanned' => 'No'
        ]);
    }
}
