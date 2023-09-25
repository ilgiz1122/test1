<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->longText('opisanie')->nullable();
            $table->string('img')->nullable();
            $table->bigInteger('time');
            $table->bigInteger('price')->default('0');
            $table->bigInteger('oldprice')->default('0');
            $table->bigInteger('status')->default('0');
            $table->bigInteger('language')->nullable();
            $table->bigInteger('partnerka')->default('0');
            $table->bigInteger('kol_popytkov')->default('0');
            $table->bigInteger('srok_dostupa')->default('0');
            $table->bigInteger('test_category_id')->unsigned()->nullable();
            $table->bigInteger('test_podcategory_id')->unsigned()->nullable();
            $table->foreign('test_podcategory_id')
                ->references('id')
                ->on('test_podcategories')
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
        Schema::dropIfExists('tests');
    }
}