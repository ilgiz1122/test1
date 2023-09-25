<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('for_menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_title');
            $table->bigInteger('menu_type')->default('1');
            $table->bigInteger('menu_for_action')->nullable();
            $table->bigInteger('menu_status')->default('0');
            $table->bigInteger('menu_katar_nomeri_for_sidebar')->nullable();
            $table->string('menu_ssylka')->nullable();
            $table->string('menu_ico_ssylka')->nullable();
            $table->longText('menu_ico_fontawesome')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('for_menus');
    }
}