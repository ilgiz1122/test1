<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewPokazColumnInOnlainSabakUroksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('onlain_sabak_uroks', function (Blueprint $table) {
            $table->bigInteger('pokaz_soderjimoe_do_nachalo_uroka')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('onlain_sabak_uroks', function (Blueprint $table) {
            $table->dropColumn('pokaz_soderjimoe_do_nachalo_uroka');
        });
    }
}