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
        Schema::create('phone_logs', function (Blueprint $table) {
            $table->id();
            $table->morphs('loggable');
            $table->string('chargeStatus');//enum
            $table->unsignedBigInteger('authcore_id')->references('id')->on('authcores');
            $table->unsignedBigInteger('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('phone_logs');
    }
};
