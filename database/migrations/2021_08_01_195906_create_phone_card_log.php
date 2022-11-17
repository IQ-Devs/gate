<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneCardLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_card_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authcores_id')->references('id')->on('authcores');
            $table->string('Comments');
            $table->enum('charge_status', \App\Models\Enums::charge_status);
            $table->integer('CardValue');
            $table->integer('BalanceBefore');
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
        Schema::dropIfExists('phone_card_log');
    }
}
