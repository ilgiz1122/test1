<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNew7ToPoputkaTaxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('poputka_taxis', function (Blueprint $table) {
            $table->bigInteger('chykkan_oblast')->nullable();
            $table->bigInteger('chykkan_raion')->nullable();
            $table->bigInteger('barchu_oblast')->nullable();
            $table->bigInteger('barchu_raion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('poputka_taxis', function (Blueprint $table) {
            $table->dropColumn('chykkan_oblast');
            $table->dropColumn('chykkan_raion');
            $table->dropColumn('barchu_oblast');
            $table->dropColumn('barchu_raion');
        });
    }
}
