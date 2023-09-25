<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewAkciaNaNesMesColumnInOnlainSabakPredmetSabaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('onlain_sabak_predmet_sabaks', function (Blueprint $table) {
            $table->bigInteger('uch_ai_akcia')->nullable();
            $table->bigInteger('alty_ai_akcia')->nullable();
            $table->bigInteger('toguz_ai_akcia')->nullable();
            $table->bigInteger('bir_jyl_akcia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('onlain_sabak_predmet_sabaks', function (Blueprint $table) {
            $table->dropColumn('uch_ai_akcia');
            $table->dropColumn('alty_ai_akcia');
            $table->dropColumn('toguz_ai_akcia');
            $table->dropColumn('bir_jyl_akcia');
        });
    }
}