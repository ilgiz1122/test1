<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZadanieOtvetiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zadanie_otveties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('urok_id');
            $table->bigInteger('zadanie_id')->unsigned();
            $table->longText('text')->nullable();
            $table->string('file')->nullable();
            $table->bigInteger('ball')->nullable();
            $table->longText('comment')->nullable();
            $table->foreign('zadanie_id')
                ->references('id')
                ->on('zadanies')
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
        Schema::dropIfExists('zadanie_otveties');
    }
}