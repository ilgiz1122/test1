<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnTextVoprosaToTestVoprosiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_voprosies', function (Blueprint $table) {
            $table->longText('text_voprosa')->nullable()->change();
            $table->string('img_voprosa')->nullable()->change();
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
            $table->longText('text_voprosa')->change();
            $table->string('img_voprosa')->change();
        });
    }
}