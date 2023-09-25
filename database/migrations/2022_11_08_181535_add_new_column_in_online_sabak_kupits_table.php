<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnInOnlineSabakKupitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('online_sabak_kupits', function (Blueprint $table) {
            $table->bigInteger('avtor_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('online_sabak_kupits', function (Blueprint $table) {
            $table->dropColumn('avtor_id');
        });
    }
}