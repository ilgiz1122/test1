<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnInOlimpiadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('olimpiadas', function (Blueprint $table) {
            $table->bigInteger('predmet');
            $table->bigInteger('klass');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('olimpiadas', function (Blueprint $table) {
            $table->dropColumn('predmet');
            $table->dropColumn('klass');
        });
    }
}