<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewCol4ToPoputkaTaxiPrilojenieNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('poputka_taxi_prilojenie_names', function (Blueprint $table) {
            $table->string('region_id_for_taksi')->nullable();
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
            $table->dropColumn('region_id_for_taksi');
        });
    }
}
