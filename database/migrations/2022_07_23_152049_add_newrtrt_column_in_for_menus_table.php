<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewrtrtColumnInForMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('for_menus', function (Blueprint $table) {
            $table->bigInteger('for_id_vlojennogo_menu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('for_menus', function (Blueprint $table) {
            $table->dropColumn('for_id_vlojennogo_menu');
        });
    }
}