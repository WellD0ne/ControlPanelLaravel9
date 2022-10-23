<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_operations', function (Blueprint $table) {
            $table->bigIncrements('op_id');
            $table->integer('user_id');
            $table->integer('owner_id');
            $table->integer('op_type');
            $table->timestamp('op_date');
            $table->bigInteger('op_summa');
            $table->integer('op_card_id');
            $table->timestamp('system_date');
            $table->string('number', 10);
            $table->bigInteger('balance_buh');
            $table->string('descr', 255);
            $table->integer('finance')->nullable();
            $table->integer('isbuhdoc');
            $table->integer('end_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finance_operations');
    }
};
