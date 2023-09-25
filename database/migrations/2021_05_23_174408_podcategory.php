<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Podcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        if(!Schema::hasTable('podcategories')){
    Schema::create('podcategories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->bigInteger('price');
            $table->string('img');
            $table->bigInteger('cat_id')->unsigned();
            $table->foreign('cat_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->timestamps();
        });
    } 
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
