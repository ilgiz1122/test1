<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineSabakUrokFramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_sabak_urok_frames', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('onlain_sabak_urok_id')->unsigned();
            $table->string('title');
            $table->string('ssylka');
            $table->foreign('onlain_sabak_urok_id')
                ->references('id')
                ->on('onlain_sabak_uroks')
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
        Schema::dropIfExists('online_sabak_urok_frames');
    }
}