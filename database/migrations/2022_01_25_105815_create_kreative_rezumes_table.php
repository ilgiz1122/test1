<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKreativeRezumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kreative_rezumes', function (Blueprint $table) {
            $table->id();
            $table->string('familya')->nullable();
            $table->string('aty');
            $table->string('at_aty')->nullable();
            $table->string('tuulgan_kunu')->nullable();
            $table->string('ui_buloluk_abaly')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('staj')->nullable();
            $table->string('azyrky_kyzmaty')->nullable();
            $table->string('whatsapp')->nullable();
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
        Schema::dropIfExists('kreative_rezumes');
    }
}