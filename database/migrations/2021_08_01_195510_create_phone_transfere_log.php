<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneTransfereLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_transfere_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phonelist_id')->references('id')->on('phonelists');
            $table->unsignedBigInteger('charge_id')->references('id')->on('charges');
            $table->string('Comments');
            $table->enum('charge_status',\App\Enums::charge_status);
            $table->integer('Transvalue');
            $table->integer('Balancebefore');
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
