<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlainSabakPredmetSabaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onlain_sabak_predmet_sabaks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('onlain_sabak_predmety_id')->unsigned();
            $table->bigInteger('onlain_sabak_mugalim_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('col_uchenikov')->default('20');
            $table->bigInteger('status_admin')->default('1');
            $table->bigInteger('status')->default('0');
            $table->bigInteger('price')->default('0');
            $table->bigInteger('old_price')->nullable();
            $table->bigInteger('akcia')->nullable();
            $table->bigInteger('akcia_data_okonchanie')->nullable();
            $table->bigInteger('dostup_na_pokupku_za_neskolko_mesyacev')->default('1');
            $table->longText('opisanie')->nullable();
            $table->string('ssylka_na_online_urok')->nullable();
            $table->bigInteger('service_online_uroka')->nullable();
            $table->longText('parol_i_identifikator_na_online_urok')->nullable();
            $table->bigInteger('ispolzovat_dlya_vseh_urokov')->nullable();
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
        Schema::dropIfExists('onlain_sabak_predmet_sabaks');
    }
}