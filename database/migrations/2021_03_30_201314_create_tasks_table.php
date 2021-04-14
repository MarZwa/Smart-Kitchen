<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('image')->default("/icon/vacuum.png");
            $table->integer('interval')->default(3); // Hoeveel dagen moeten er tussen twee voltooide taken zitten?
            $table->string('sensor')->nullable(); //De sensor label die door de Arduino serieel met de Pi gecommniceerd wordt.
            $table->string('sensor_state'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
