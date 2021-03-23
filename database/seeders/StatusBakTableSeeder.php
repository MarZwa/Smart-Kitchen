<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StatusBakTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_bak')->insert([
            'status' => Null,
        ]);
    }
}
