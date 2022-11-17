<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneTransferLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_transfer_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authcore_id')->references('id')->on('authcores');
            $table->unsignedBigInteger('user_id')->references('id')->on('users');
            $table->string('user_phone');
            $table->string('Comments');
            $table->enum('charge_status', \App\Enums::charge_status);
            $table->integer('TransValue'); // from the user
            $table->integer('BalanceBefore'); //from authcore before adding the transaction value
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
        Schema::dropIfExists('phone_transfere_log');
    }
}
