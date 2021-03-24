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
            $table->integer('groente');
            $table->integer('fruit');
            $table->integer('brood');
            $table->integer('graanpr/aardappelen');
            $table->integer('vis');
            $table->integer('peulvruchten');
            $table->integer('vlees');
            $table->integer('ei');
            $table->integer('noten');
            $table->integer('melk(producten)');
            $table->integer('kaas');
            $table->integer('vetten');
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
