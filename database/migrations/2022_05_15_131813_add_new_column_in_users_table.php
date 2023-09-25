<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('f_fio')->nullable();
            $table->string('i_fio')->nullable();
            $table->string('o_fio')->nullable();
            $table->bigInteger('oblast_id')->nullable();
            $table->bigInteger('raion_shaar_id')->nullable();
            $table->bigInteger('aiyly')->nullable();
            $table->bigInteger('mektep_id')->nullable();
            $table->bigInteger('mugalim_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('f_fio');
            $table->dropColumn('i_fio');
            $table->dropColumn('o_fio');
            $table->dropColumn('oblast_id');
            $table->dropColumn('raion_shaar_id');
            $table->dropColumn('aiyly');
            $table->dropColumn('mektep_id');
            $table->dropColumn('mugalim_id');
        });
    }
}