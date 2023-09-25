<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoputkaTaxiRaionShaarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poputka_taxi_raion_shaars', function (Blueprint $table) {
            $table->id();
            $table->string('raion_shaar')->nullable();
            $table->bigInteger('poputka_taxi_oblasts_id')->unsigned();
            $table->foreign('poputka_taxi_oblasts_id')
                ->references('id')
                ->on('poputka_taxi_oblasts')
                ->onDelete('cascade');
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
        Schema::dropIfExists('poputka_taxi_raion_shaars');
    }
}
