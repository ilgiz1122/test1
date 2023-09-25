<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoputkaTaxiImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poputka_taxi_imgs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jolgo_chyguu_datasy')->nullable();
            $table->string('img')->nullable();
            $table->bigInteger('poputka_taxi_id')->unsigned();
            $table->foreign('poputka_taxi_id')
                ->references('id')
                ->on('poputka_taxis')
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
        Schema::dropIfExists('poputka_taxi_imgs');
    }
}
