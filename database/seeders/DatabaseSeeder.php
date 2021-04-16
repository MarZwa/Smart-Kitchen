<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AfvalBakTableSeeder::class,
            AfvalRestTableSeeder::class,
            AfvalPlasticTableSeeder::class,
            AfvalGftTableSeeder::class,
            StatusBakTableSeeder::class,
            VolheidBakkenTableSeeder::class,
            RecommendedFoodsTableSeeder::class,
            CutleryTableSeeder::class,
            UsersTableSeeder::class,
            GroceryTableSeeder::class,
        ]);
    }
}
