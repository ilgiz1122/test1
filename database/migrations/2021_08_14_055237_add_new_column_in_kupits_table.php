<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnInKupitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kupits', function (Blueprint $table) {
            $table->bigInteger('podcat_user_id')->unsigned();
            $table->bigInteger('pribyl');
            $table->string('promocod')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kupits', function (Blueprint $table) {
            $table->dropColumn('podcat_user_id');
            $table->dropColumn('pribyl');
            $table->dropColumn('promocod');
        });
    }
}
