<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopolnenieBalansResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popolnenie_balans_results', function (Blueprint $table) {
            $table->id();
            $table->string('pg_order_id');
            $table->bigInteger('pg_payment_id');
            $table->string('pg_amount');
            $table->string('pg_currency');
            $table->string('pg_net_amount')->nullable();
            $table->string('pg_ps_amount')->nullable();
            $table->string('pg_ps_full_amount')->nullable();
            $table->string('pg_ps_currency')->nullable();
            $table->string('pg_payment_system');
            $table->string('pg_description');
            $table->bigInteger('pg_result');
            $table->dateTime('pg_payment_date', $precision = 0);
            $table->bigInteger('pg_can_reject');
            $table->string('pg_user_phone')->nullable();
            $table->string('pg_user_contact_email')->nullable();
            $table->bigInteger('pg_testing_mode');
            $table->bigInteger('pg_captured')->nullable();
            $table->string('pg_card_pan')->nullable();
            $table->string('pg_salt')->nullable();
            $table->string('pg_sig')->nullable();
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
        Schema::dropIfExists('popolnenie_balans_results');
    }
}