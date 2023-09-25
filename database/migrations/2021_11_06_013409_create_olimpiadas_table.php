<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOlimpiadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olimpiadas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nazvanie_orgonizasii')->nullable();
            $table->string('title');
            $table->longText('opisanie')->nullable();
            $table->string('img');
            $table->bigInteger('data_zavershenie_registrasii')->nullable();
            $table->bigInteger('data_public_itogov')->nullable();
            $table->bigInteger('status')->default('0');
            $table->bigInteger('language')->nullable();
            $table->bigInteger('partnerka')->default('0');
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
        Schema::dropIfExists('olimpiadas');
    }
}