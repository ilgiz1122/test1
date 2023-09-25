<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeVhodasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_vhodas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('avtor_id')->unsigned();
            $table->bigInteger('type')->nullable();
            $table->string('text_coda');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('status')->default('0');
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('colichestvo_ispolzovanie')->nullable();
            $table->bigInteger('colichestvo_view')->default('0');
            $table->bigInteger('product_price')->nullable();
            $table->bigInteger('summa_komissii_sistemy')->nullable();
            $table->foreign('avtor_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('code_vhodas');
    }
}