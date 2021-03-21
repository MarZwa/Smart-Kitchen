<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('groente');
            $table->text('fruit');
            $table->text('brood');
            $table->text('graanpr/aardappelen');
            $table->text('vis');
            $table->text('peulvruchten');
            $table->text('vlees');
            $table->text('ei');
            $table->text('noten');
            $table->text('melk(producten)');
            $table->text('kaas');
            $table->text('vetten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
