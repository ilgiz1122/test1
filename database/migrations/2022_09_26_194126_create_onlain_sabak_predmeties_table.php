<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlainSabakPredmetiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onlain_sabak_predmeties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('onlain_sabak_category_id')->unsigned();
            $table->string('predmet_title');
            $table->string('img')->nullable();
            $table->string('ico')->nullable();
            $table->foreign('onlain_sabak_category_id')
                ->references('id')
                ->on('onlain_sabak_categories')
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
        Schema::dropIfExists('onlain_sabak_predmeties');
    }
}