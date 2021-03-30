<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFoodsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('groente')->default(0);
            $table->string('fruit')->default(0);
            $table->string('brood')->default(0);
            $table->string('aardappelen/graanpr')->default(0);
            $table->string('vis')->default(0);
            $table->string('peulvruchten')->default(0);
            $table->string('vlees')->default(0);
            $table->string('ei')->default(0);
            $table->string('noten')->default(0);
            $table->string('melk(producten)')->default(0);
            $table->string('kaas')->default(0);
            $table->string('vetten')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
