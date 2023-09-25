<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Uroky extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('urokies')){
    Schema::create('urokies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->bigInteger('podcat_id')->unsigned();
            $table->text('text');
            $table->enum('status', ['0', '1']);
            $table->string('ssylka')->nullable();
            $table->foreign('podcat_id')
                ->references('id')
                ->on('podcategories')
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
