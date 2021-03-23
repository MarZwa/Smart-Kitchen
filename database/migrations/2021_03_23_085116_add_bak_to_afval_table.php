<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBakToAfvalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('afval', function (Blueprint $table) {
            $table->string('bak');
            $table->foreign('bak')->references('bak')->on('afval_bak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('afval', function (Blueprint $table) {
            $table->dropForeign('afval_bak_foreign');
            $table->dropColumn('bak');
        });
    }
}
