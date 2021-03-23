<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendedFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommended_foods', function (Blueprint $table) {
            $table->string('groente');
            $table->string('fruit');
            $table->string('brood');
            $table->string('graanpr/aardappelen');
            $table->string('vis');
            $table->string('peulvruchten');
            $table->string('vlees');
            $table->string('ei');
            $table->string('noten');
            $table->string('melk(producten)');
            $table->string('kaas');
            $table->string('vetten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recommended_foods');
    }
}
