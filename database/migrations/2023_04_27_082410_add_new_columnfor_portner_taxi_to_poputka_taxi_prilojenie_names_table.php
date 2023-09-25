<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnforPortnerTaxiToPoputkaTaxiPrilojenieNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('poputka_taxi_prilojenie_names', function (Blueprint $table) {
            $table->string('ssylka')->nullable();
            $table->string('region_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('poputka_taxi_prilojenie_names', function (Blueprint $table) {
            $table->dropColumn('ssylka');
            $table->dropColumn('region_id');
        });
    }
}
