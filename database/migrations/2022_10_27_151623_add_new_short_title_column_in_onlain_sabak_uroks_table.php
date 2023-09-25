<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewShortTitleColumnInOnlainSabakUroksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('onlain_sabak_uroks', function (Blueprint $table) {
            $table->string('short_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('onlain_sabak_uroks', function (Blueprint $table) {
            $table->dropColumn('short_title');
        });
    }
}