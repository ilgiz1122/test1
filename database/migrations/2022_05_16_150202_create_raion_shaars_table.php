<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaionShaarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raion_shaars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('oblast_id')->unsigned();
            $table->string('title');
            $table->foreign('oblast_id')
                ->references('id')
                ->on('oblasts')
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
        Schema::dropIfExists('raion_shaars');
    }
}