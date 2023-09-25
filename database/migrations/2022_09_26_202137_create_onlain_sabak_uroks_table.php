<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlainSabakUroksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onlain_sabak_uroks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('onlain_sabak_predmet_sabak_id')->unsigned();
            $table->bigInteger('data_uroka');
            $table->string('ssylka_na_online_urok')->nullable();
            $table->bigInteger('service_online_uroka')->nullable();
            $table->longText('parol_i_identifikator_na_online_urok')->nullable();
            $table->longText('text')->nullable();
            $table->bigInteger('youtube_control_status')->default('0');
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
        Schema::dropIfExists('onlain_sabak_uroks');
    }
}