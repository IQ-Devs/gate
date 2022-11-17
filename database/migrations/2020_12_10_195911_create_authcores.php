<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthcores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authcores', function (Blueprint $table) {
            $table->id();
            $table->string('Phone');
            $table->enum('Charge_Type', \App\Enums::chargeType);
            $table->enum('Status', \App\Enums::PhoneStatus);
            $table->enum('Provider', \App\Enums::providers);
            $table->integer('UsageLimit');
            $table->string('Pid');
            $table->string('DeviceId');
            $table->longText('access_token');
            $table->longText('refresh_token');
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
        Schema::dropIfExists('authcores');
    }
}
