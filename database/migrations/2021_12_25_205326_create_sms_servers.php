<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsServers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_servers', function (Blueprint $table) {
            $table->id();
            $table->integer('phoneNum');
            $table->enum('Provider', \App\Models\Enums::providers)->nullable(); //need for recognize in the controller
            $table->text('msgContext');
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
        Schema::dropIfExists('sms_servers');
    }
}
