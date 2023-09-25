<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewInTestControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_controls', function (Blueprint $table) {
            $table->bigInteger('kol_voprosov');
            $table->bigInteger('test_summa_ballov');
            $table->bigInteger('kol_pravilnyh_otvetov')->nullable();
            $table->bigInteger('kol_ballov_usera')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_controls', function (Blueprint $table) {
            $table->dropColumn('kol_voprosov');
            $table->dropColumn('test_summa_ballov');
            $table->dropColumn('kol_pravilnyh_otvetov');
            $table->dropColumn('kol_ballov_usera');
        });
    }
}