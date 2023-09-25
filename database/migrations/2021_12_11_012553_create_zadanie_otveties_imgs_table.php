<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZadanieOtvetiesImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zadanie_otveties_imgs', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->foreignId('zadanie_otveties_id')
                ->constraint('zadanie_otveties')
                ->onDelete('cascade');
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
        Schema::dropIfExists('zadanie_otveties_imgs');
    }
}