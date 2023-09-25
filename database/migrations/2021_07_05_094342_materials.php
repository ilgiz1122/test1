<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Materials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('materialies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->string('opisanie');
            $table->string('language');
            $table->bigInteger('materialcategory_id')->unsigned();
            $table->string('ssylka');
            $table->string('price');
            $table->string('size');
            $table->string('type');
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
            $table->string('img1_1');
            $table->string('img2_2');
            $table->string('img3_3');
            $table->enum('status', ['0', '1'])->default('0');
            $table->bigInteger('materialpodcategory_id')->unsigned();
            $table->foreign('materialpodcategory_id')
                ->references('id')
                ->on('materialpodcategories')
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
        //
    }
}
