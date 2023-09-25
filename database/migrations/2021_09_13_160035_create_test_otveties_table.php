<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestOtvetiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_otveties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('test_voprosy_id')->unsigned();
            $table->longText('test_otvety');
            $table->bigInteger('status_otveta');
            $table->foreign('test_voprosy_id')
                ->references('id')
                ->on('test_voprosies')
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
        Schema::dropIfExists('test_otveties');
    }
}