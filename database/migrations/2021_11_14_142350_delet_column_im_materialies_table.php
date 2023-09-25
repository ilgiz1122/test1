<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeletColumnImMaterialiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materialies', function($table) {
             $table->dropColumn('img1');
             $table->dropColumn('img2');
             $table->dropColumn('img3');
             $table->dropColumn('img1_1');
             $table->dropColumn('img2_2');
             $table->dropColumn('img3_3');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materialies', function($table) {
             $table->string('img1');
            $table->string('img2');
            $table->string('img3');
            $table->string('img1_1');
            $table->string('img2_2');
            $table->string('img3_3');
          });
    }
}