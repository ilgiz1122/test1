<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnInOlimpiadaTuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('olimpiada_turies', function (Blueprint $table) {
            $table->bigInteger('data_okonchanie_tura')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('olimpiada_turies', function (Blueprint $table) {
            $table->dropColumn('data_okonchanie_tura');
        });
    }
}