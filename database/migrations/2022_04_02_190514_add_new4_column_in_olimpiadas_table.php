<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNew4ColumnInOlimpiadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('olimpiadas', function (Blueprint $table) {
            $table->bigInteger('data_nachalo_registrasii')->nullable();
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
            $table->dropColumn('data_nachalo_registrasii');
        });
    }
}