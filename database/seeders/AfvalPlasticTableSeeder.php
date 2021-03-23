<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AfvalPlasticTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plastic_afval_array = ['Plastic zak', 'Cola blikje', 'Bubbeltjesplastic', 'Vershoudfolie', 'Boterkuipje'];
        foreach($plastic_afval_array as $plastic){
            DB::table('afval')->insert([
                'naam' => $plastic,
                'bak' => 'Plastic',
            ]);
        }
    }
}
