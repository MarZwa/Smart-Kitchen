<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

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
            'finished' => true,
            'started_at' => Carbon::createFromFormat('Y-m-d H:i:s', '1970-01-01 13:00:10'),
            'finished_at' => Carbon::createFromFormat('Y-m-d H:i:s','1970-01-01 14:00:10'),
        ]);
    }
}
