<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOlimpiadaRegistrasiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olimpiada_registrasias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('olimpiada_id')->unsigned();
            $table->bigInteger('tur_number')->default('0');
            $table->bigInteger('status')->default('0');
            $table->bigInteger('price')->default('0');
            $table->bigInteger('price_minus_in_moderator')->nullable();
            $table->foreign('olimpiada_id')
                ->references('id')
                ->on('olimpiadas')
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
        Schema::dropIfExists('olimpiada_registrasias');
    }
}