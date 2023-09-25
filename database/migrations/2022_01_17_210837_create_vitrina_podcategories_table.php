<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitrinaPodcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitrina_podcategories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('img');
            $table->bigInteger('vitrina_category_id')->unsigned();
            $table->foreign('vitrina_category_id')
                ->references('id')
                ->on('vitrina_categories')
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
        Schema::dropIfExists('vitrina_podcategories');
    }
}