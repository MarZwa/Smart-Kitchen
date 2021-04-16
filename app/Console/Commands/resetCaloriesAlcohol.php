<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class resetCaloriesAlcohol extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:CalAlc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resetting current calories and alcohol';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('users')->update([
            'current_calories' => 0,
            'current_alcohol' => 0,
        ]);
    }
}
