<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNew009ColumnInModeratorFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('moderator_functions', function (Blueprint $table) {
            $table->bigInteger('kurs_plus_code')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moderator_functions', function (Blueprint $table) {
            $table->dropColumn('kurs_plus_code');
        });
    }
}