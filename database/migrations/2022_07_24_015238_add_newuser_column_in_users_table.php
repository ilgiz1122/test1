<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewuserColumnInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('org_img')->nullable();
            $table->string('img_80_80')->nullable();
            $table->string('img_160_160')->nullable();
            $table->string('img_250_250')->nullable();
            $table->string('img_600_600')->nullable();
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
            
            $table->dropColumn('org_img');
            $table->dropColumn('img_80_80');
            $table->dropColumn('img_160_160');
            $table->dropColumn('img_250_250');
            $table->dropColumn('img_600_600');
        });
    }
}