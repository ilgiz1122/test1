<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestControlsVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_controls_variants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('test_controls_id')->unsigned();
            $table->bigInteger('vopros_id');
            $table->bigInteger('otvet_id');
            $table->foreign('test_controls_id')
                ->references('id')
                ->on('test_controls')
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
        Schema::dropIfExists('test_controls_variants');
    }
}