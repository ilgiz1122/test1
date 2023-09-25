<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewAkciaPriceColumnInOnlainSabakPredmetSabaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('onlain_sabak_predmet_sabaks', function (Blueprint $table) {
            $table->bigInteger('akcia_price')->nullable();
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
            $table->dropColumn('akcia_price');
        });
    }
}