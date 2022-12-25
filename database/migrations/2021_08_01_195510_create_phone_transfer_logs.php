<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneTransferLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_transfer_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user_phone');
            $table->string('Comments');
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
