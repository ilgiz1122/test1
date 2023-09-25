<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('for_role');
            $table->bigInteger('user_id')->nullable();
            $table->string('fio')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->longText('text')->nullable();
            $table->bigInteger('status')->default('1');
            $table->bigInteger('nomer_certificata')->nullable();
            $table->bigInteger('data_in_certificate')->nullable();
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
        Schema::dropIfExists('certificate_users');
    }
}