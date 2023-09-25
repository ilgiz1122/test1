<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaterialyUserIdColumnInKupitmaterialovsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kupitmaterialovs', function (Blueprint $table) {
            $table->bigInteger('materialy_user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kupitmaterialovs', function (Blueprint $table) {
            $table->dropColumn('materialy_user_id');
        });
    }
}
