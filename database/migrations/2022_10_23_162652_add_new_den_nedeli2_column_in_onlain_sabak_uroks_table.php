<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewDenNedeli2ColumnInOnlainSabakUroksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('onlain_sabak_uroks', function (Blueprint $table) {
            $table->bigInteger('online_sabak_dni_nedeli_id');
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
            $table->dropColumn('online_sabak_dni_nedeli_id');
        });
    }
}