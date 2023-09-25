<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumberColumnInTestVoprosiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_voprosies', function (Blueprint $table) {
            $table->bigInteger('katar_nomeri')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_voprosies', function (Blueprint $table) {
            $table->dropColumn('katar_nomeri');
        });
    }
}