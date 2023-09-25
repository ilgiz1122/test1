<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineSabakKupitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_sabak_kupits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('onlain_sabak_id')->unsigned();
            $table->bigInteger('price')->default('0');
            $table->bigInteger('pribyl_avtora')->default('0');
            $table->bigInteger('pribyl_systemy')->default('0');
            $table->string('promocod')->nullable();
            $table->bigInteger('data_nachalo_dostupa')->nullable();
            $table->bigInteger('data_okonchanie_dostupa')->nullable();
            $table->foreign('onlain_sabak_id')
                ->references('id')
                ->on('onlain_sabak_predmet_sabaks')
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
        Schema::dropIfExists('online_sabak_kupits');
    }
}