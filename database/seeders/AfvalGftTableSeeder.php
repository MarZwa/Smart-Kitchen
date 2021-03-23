<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AfvalGftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gft_afval_array = ['Bananenschil', 'Botjes', 'Bloemen', 'Koffieprut', 'Potgrond'];
        foreach($gft_afval_array as $gft){
            DB::table('afval')->insert([
                'naam' => $gft,
                'bak' => 'Gft',
            ]);
        }
    }
}
