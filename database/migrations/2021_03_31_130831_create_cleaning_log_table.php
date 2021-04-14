<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateCleaningLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_log', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->foreign('user_name')->references('name')->on('users');
            $table->string('task_name');
            $table->foreign('task_name')->references('name')->on('tasks');
            $table->boolean('finished')->default(false);
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('finished_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cleaning_log', function (Blueprint $table) {
            $table->dropForeign(['task_name']);
            $table->dropForeign(['user_name']);
        });
        Schema::dropIfExists('cleaning_log');
    }
    
}
