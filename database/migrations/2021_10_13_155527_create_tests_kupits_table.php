<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsKupitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_kupits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('test_id')->unsigned();
            $table->bigInteger('test_autor_id')->unsigned();
            $table->bigInteger('price');
            $table->string('proverka');
            $table->bigInteger('pribyl');
            $table->string('promocod')->nullable();
            $table->bigInteger('time')->nullable();
            $table->bigInteger('srok_dostupa')->default('0');
            $table->bigInteger('kol_popytkov');
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
        Schema::dropIfExists('tests_kupits');
    }
}