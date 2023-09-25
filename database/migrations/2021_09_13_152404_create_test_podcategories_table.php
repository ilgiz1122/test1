<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestPodcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_podcategories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('img');
            $table->bigInteger('test_category_id')->unsigned();
            $table->foreign('test_category_id')
                ->references('id')
                ->on('test_categories')
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
        Schema::dropIfExists('test_podcategories');
    }
}