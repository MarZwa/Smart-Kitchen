<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_usage', function (Blueprint $table) {
            $table->id();
            $table->string('profile_name');
            $table->foreign("profile_name")->references("name")->on("profile");
            $table->string('date'); //DD-MM-YYYY
            $table->integer('calories');
            $table->integer('alcohol');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_usage', function (Blueprint $table){
            $table->dropForeign('product_usage_profile_name_foreign');
        });
        Schema::dropIfExists('product_usage');
    }
}
