<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPromocodColumnInKupitmaterialovsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kupitmaterialovs', function (Blueprint $table) {
            $table->string('promocod')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kupitmaterialovs', function (Blueprint $table) {
             $table->dropColumn('promocod');
        });
    }
}
