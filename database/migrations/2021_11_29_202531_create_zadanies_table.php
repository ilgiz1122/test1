<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZadaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zadanies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kurs_id');
            $table->bigInteger('urok_id')->unsigned();
            $table->longText('text')->nullable();
            $table->string('file')->nullable();
            $table->bigInteger('ball')->default('0');
            $table->foreign('urok_id')
                ->references('id')
                ->on('urokies')
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
        Schema::dropIfExists('zadanies');
    }
}