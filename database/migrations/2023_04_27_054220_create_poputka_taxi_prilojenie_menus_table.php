<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoputkaTaxiPrilojenieMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poputka_taxi_prilojenie_menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('prilojenie_name_id')->unsigned();
            $table->bigInteger('poputka_taxi_category_id')->unsigned();
            $table->bigInteger('status')->default('0');
            $table->foreign('prilojenie_name_id')
                ->references('id')
                ->on('poputka_taxi_prilojenie_names')
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
        Schema::dropIfExists('poputka_taxi_prilojenie_menus');
    }
}
