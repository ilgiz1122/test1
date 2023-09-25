<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineSabakUrokTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_sabak_urok_tests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('onlain_sabak_urok_id')->unsigned();
            $table->bigInteger('test_id');
            $table->foreign('onlain_sabak_urok_id')
                ->references('id')
                ->on('onlain_sabak_uroks')
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
        Schema::dropIfExists('online_sabak_urok_tests');
    }
}