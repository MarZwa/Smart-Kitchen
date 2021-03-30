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
            'groente' => 100,
            'fruit' => 75,
            'brood' => 3,
            'aardappelen' => 69,
            'vis' => 20,
            'peulvruchten' => 135,
            'vlees' => 420,
            'ei' => 0,
            'noten' => 11,
            'melk' => 120,
            'kaas' => 22,
            'vetten' => 53,
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
