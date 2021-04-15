<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class VolheidBakkenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('volhied_bakken')->insert([
            'bak' => 'Rest',
            'vol' => false,
        ]);

        DB::table('volhied_bakken')->insert([
            'bak' => 'Plastic',
            'vol' => false,
        ]);

        DB::table('volhied_bakken')->insert([
            'bak' => 'Gft',
            'vol' => false,
        ]);
    }
}
