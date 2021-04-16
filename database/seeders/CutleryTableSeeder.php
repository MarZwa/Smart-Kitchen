<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CutleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cutlery')->insert([
            'cutlery' => 'Brood bord',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Boter mes',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Kaart',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Koffie kopje',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Koffie schotel',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Dessert lepel',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Dessert vork',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Water glas',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Rode wijn glas',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Champagne glas',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Witte wijn glas',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Sherry glas',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Servet',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Salade vork',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Vis vork',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Diner vork',
            'rfid' => '46212016223276129',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Diner bord',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Soep kom',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Salade bord',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Diner mes',
            'rfid' => '44111516223276129',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Salade mes',
            'rfid' => '46211916223276129',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Diner lepel',
            'rfid' => '42610616223276129',
        ]);

        DB::table('cutlery')->insert([
            'cutlery' => 'Soep lepel',
            'rfid' => '4629316223276129',
        ]);
    }
}
