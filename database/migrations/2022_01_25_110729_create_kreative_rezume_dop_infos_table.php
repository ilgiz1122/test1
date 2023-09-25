<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKreativeRezumeDopInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kreative_rezume_dop_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kreative_rezume_id')->unsigned();
            $table->bigInteger('type_info')->default('0');
            $table->longText('info')->nullable();
            $table->foreign('kreative_rezume_id')
                ->references('id')
                ->on('kreative_rezumes')
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
        Schema::dropIfExists('kreative_rezume_dop_infos');
    }
}