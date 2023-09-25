<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnMaterialiesPartnerkaToMaterialiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materialies', function (Blueprint $table) {
            $table->bigInteger('partnerka')->default('0')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materialies', function (Blueprint $table) {
            $table->enum('partnerka', ['0', '1'])->change();
        });
    }
}
