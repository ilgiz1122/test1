<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOlimpiadaTuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olimpiada_turies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('olimpiada_id')->unsigned();
            $table->bigInteger('tur_number');
            $table->string('title')->nullable();
            $table->longText('opisanie')->nullable();
            $table->string('img')->nullable();
            $table->bigInteger('price')->default('0');
            $table->bigInteger('nachalo_zdachi_tura')->nullable();
            $table->bigInteger('status')->default('0');
            $table->bigInteger('dostup')->default('0');
            $table->bigInteger('pokazat_rezultat_tura')->default('0');
            $table->bigInteger('max_kol_users')->nullable();
            $table->foreign('olimpiada_id')
                ->references('id')
                ->on('olimpiadas')
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
        Schema::dropIfExists('olimpiada_turies');
    }
}