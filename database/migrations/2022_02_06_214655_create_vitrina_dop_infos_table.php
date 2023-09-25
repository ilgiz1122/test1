<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitrinaDopInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitrina_dop_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type_info')->default('0');
            $table->longText('info')->nullable();
            $table->bigInteger('vitrina_id')->unsigned();
            $table->foreign('vitrina_id')
                ->references('id')
                ->on('vitrinas')
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
        Schema::dropIfExists('vitrina_dop_infos');
    }
}