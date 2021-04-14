<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CleaningLogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cleaning_log')->insert([
            'user_name' => 'Bas',
            'task_name' => 'stofzuigen',
            'finished' => false,
        ]);
    }
}
