<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressProhojdenieUrokasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_prohojdenie_urokas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('kurs_id');
            $table->bigInteger('urok_id')->unsigned();
            $table->bigInteger('kupit_id');
            $table->bigInteger('otkryl')->default('0');
            $table->bigInteger('status_vypol_zadanii')->default('0');
            $table->foreign('urok_id')
                ->references('id')
                ->on('urokies')
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
        Schema::dropIfExists('progress_prohojdenie_urokas');
    }
}