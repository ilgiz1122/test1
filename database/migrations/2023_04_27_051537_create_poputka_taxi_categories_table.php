<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoputkaTaxiCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poputka_taxi_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_big_title')->nullable();
            $table->string('category_small_title')->nullable();
            $table->string('category_img')->nullable();
            $table->longText('category_opisanie')->nullable();
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
        Schema::dropIfExists('poputka_taxi_categories');
    }
}
