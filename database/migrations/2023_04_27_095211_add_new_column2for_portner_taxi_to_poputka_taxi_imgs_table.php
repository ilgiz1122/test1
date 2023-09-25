<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumn2forPortnerTaxiToPoputkaTaxiImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('poputka_taxi_imgs', function (Blueprint $table) {
            $table->bigInteger('category_id')->nullable();
            $table->string('img_org')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('poputka_taxi_imgs', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('img_org');
        });
    }
}
