<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AfvalRestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rest_afval_array = ['videoband', 'papier', 'karton', 'pizzadoos', 'theezakjes'];
        foreach($rest_afval_array as $rest){
            DB::table('afval')->insert([
                'naam' => $rest,
                'bak' => 'Rest',
            ]);
        }
    }
}
