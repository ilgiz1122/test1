<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name');
            $table->bigInteger('price')->default('0');
            $table->bigInteger('old_price')->nullable();
            $table->bigInteger('aksia')->default('0');
            $table->bigInteger('procent_aksii')->nullable();
            $table->bigInteger('data_okonchanie_aksii')->nullable();
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
        Schema::dropIfExists('portfolio_types');
    }
}