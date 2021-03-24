<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tag')->nullable();
            $table->integer('groente')->default(0);
            $table->integer('fruit')->default(0);
            $table->integer('brood')->default(0);
            $table->integer('graanpr/aardappelen')->default(0);
            $table->integer('vis')->default(0);
            $table->integer('peulvruchten')->default(0);
            $table->integer('vlees')->default(0);
            $table->integer('ei')->default(0);
            $table->integer('noten')->default(0);
            $table->integer('melk(producten)')->default(0);
            $table->integer('kaas')->default(0);
            $table->integer('vetten')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_foods');
    }
}
