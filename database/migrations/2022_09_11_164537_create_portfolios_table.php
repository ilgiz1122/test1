<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('domain_id');
            $table->bigInteger('portfolio_type_id')->default('0');
            $table->bigInteger('sait_uchitely_id')->nullable();
            $table->bigInteger('sait_organizasii_id')->nullable();
            $table->bigInteger('status')->default('0');
            $table->bigInteger('col_view')->default('0');
            $table->bigInteger('raiting')->default('0');
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
        Schema::dropIfExists('portfolios');
    }
}