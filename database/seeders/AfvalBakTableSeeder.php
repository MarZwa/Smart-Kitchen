<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AfvalBakTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bak_array = ['Rest', 'Plastic', 'Gft'];
        foreach($bak_array as $bak){
            DB::table('afval_bak')->insert([
                'bak' => $bak,
            ]);
        }
    }
}
