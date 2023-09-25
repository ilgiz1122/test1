<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoputkaTaxiPrilojenieNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poputka_taxi_prilojenie_names', function (Blueprint $table) {
            $table->id();
            $table->string('prilojenie_big_title')->nullable();
            $table->string('prilojenie_small_title')->nullable();
            $table->string('prilojenie_img')->nullable();
            $table->longText('prilojenie_opisanie')->nullable();
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
        Schema::dropIfExists('poputka_taxi_prilojenie_names');
    }
}
