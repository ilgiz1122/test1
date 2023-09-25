<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnPodcategoriesPartnerkaToPodcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('podcategories', function (Blueprint $table) {
           $table->bigInteger('partnerka')->change();
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
            $table->enum('partnerka', ['0', '1'])->change();
        });
    }
}
