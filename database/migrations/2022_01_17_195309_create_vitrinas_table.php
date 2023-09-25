<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitrinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitrinas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('opisanie')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('vitrina_category_id')->unsigned();
            $table->bigInteger('vitrina_podcategory_id')->unsigned();
            $table->bigInteger('dop_category')->unsigned();
            $table->bigInteger('language')->nullable();
            $table->bigInteger('price')->default('0');
            $table->bigInteger('oldprice')->default('0');
            $table->bigInteger('status_moderator')->default('0');
            $table->bigInteger('status_admin')->default('0');
            $table->bigInteger('vip_status')->default('0');
            $table->bigInteger('view')->default('0');
            $table->string('demofile')->nullable();
            $table->string('youtube')->nullable();
            $table->string('phone_for_zvonok')->nullable();
            $table->string('phone_for_whatsapp')->nullable();
            $table->string('telegram')->nullable();
            $table->bigInteger('type_dostavki')->default('0');
            $table->foreign('vitrina_podcategory_id')
                ->references('id')
                ->on('vitrina_podcategories')
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
        Schema::dropIfExists('vitrinas');
    }
}