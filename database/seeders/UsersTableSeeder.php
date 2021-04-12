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
            'rfid' => '89153235193',
            'name' => 'Jim',
            'ophaal_dag' => Null,
        ]);

         DB::table('users')->insert([
            'rfid' => '282294723',
            'name' => 'Marc',
            'ophaal_dag' => Null,
        ]);

        DB::table('users')->insert([
            'rfid' => '1631331472',
            'name' => 'Bas',
            'ophaal_dag' => Null,
        ]);
    }
}
