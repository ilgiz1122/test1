<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKursColumnInPodcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('podcategories', function (Blueprint $table) {
            $table->string('opisanie');
            $table->string('language');
            $table->string('oldprice')->nullable();
            $table->string('video');
            $table->enum('status', ['0', '1'])->default('0');
            $table->enum('partnerka', ['0', '1']);
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
            $table->dropColumn('opisanie');
            $table->dropColumn('language');
            $table->dropColumn('oldprice');
            $table->dropColumn('video');
            $table->dropColumn('status');
            $table->dropColumn('partnerka');
        });
    }
}
