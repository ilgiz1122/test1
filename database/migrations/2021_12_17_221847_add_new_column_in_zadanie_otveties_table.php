<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnInZadanieOtvetiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zadanie_otveties', function (Blueprint $table) {
            $table->bigInteger('kupit_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zadanie_otveties', function (Blueprint $table) {
            $table->dropColumn('kupit_id');
        });
    }
}