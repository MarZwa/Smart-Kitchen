<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'name' => 'stofzuigen',
            'image' => 'public/icon/vacuum.png',
            'interval' => 3,
            'sensor' => 'obj_1',
            'sensor_state' => 'on',
        ]);

        // DB::table('tasks')->insert([
        //     'name' => 'Afwassen',
        //     'image' => 'public/icon/dishwashing.png',
        //     'frequency' => 1,
        //     'sensor' => 'obj_2',
        //     'sensor_state' => 'on',
        // ]);

    }
}
