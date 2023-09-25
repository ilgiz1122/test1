<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnInPodcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('podcategories', function (Blueprint $table) {
            $table->bigInteger('col_modulei')->default('1');
            $table->bigInteger('otuu_ykmasy')->default('0');
            $table->bigInteger('procent_perehoda')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('podcategories', function (Blueprint $table) {
            $table->dropColumn('col_modulei');
            $table->dropColumn('otuu_ykmasy');
            $table->dropColumn('procent_perehoda');
        });
    }
}