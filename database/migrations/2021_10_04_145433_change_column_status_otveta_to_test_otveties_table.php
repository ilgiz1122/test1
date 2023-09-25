<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnStatusOtvetaToTestOtvetiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_otveties', function (Blueprint $table) {
            $table->bigInteger('status_otveta')->default('0')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_otveties', function (Blueprint $table) {
            $table->bigInteger('status_otveta')->change();
        });
    }
}