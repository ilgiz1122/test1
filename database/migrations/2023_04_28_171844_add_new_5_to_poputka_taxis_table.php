<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNew5ToPoputkaTaxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('poputka_taxis', function (Blueprint $table) {
            $table->bigInteger('oblast')->nullable();
            $table->bigInteger('raion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('poputka_taxis', function (Blueprint $table) {
            $table->dropColumn('oblast');
            $table->dropColumn('raion');
        });
    }
}
