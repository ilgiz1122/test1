<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineSabakDniNedelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_sabak_dni_nedelis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('onlain_sabak_predmet_sabak_id')->unsigned();
            $table->bigInteger('den_nedeli');
            $table->bigInteger('nachalo_uroka');
            $table->bigInteger('okonchanie_uroka');
            $table->bigInteger('status')->default('1');
            $table->foreign('onlain_sabak_predmet_sabak_id')
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
        Schema::dropIfExists('online_sabak_dni_nedelis');
    }
}