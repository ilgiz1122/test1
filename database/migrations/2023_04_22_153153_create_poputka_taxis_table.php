<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoputkaTaxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poputka_taxis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('status')->default('0');
            $table->bigInteger('price')->nullable();
            $table->bigInteger('reklama_baasy')->nullable();
            $table->string('phone_z')->nullable();
            $table->string('phone_w')->nullable();
            $table->string('phone_t')->nullable();
            $table->string('ssylka_na_sait')->nullable();
            $table->longText('text')->nullable();
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
        Schema::dropIfExists('poputka_taxis');
    }
}
