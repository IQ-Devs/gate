<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->morphs('ChargeLog');
            $table->enum('ChargeType', \App\Enums::billType);
            $table->boolean('Confirmed')->default(false);
            $table->integer('Quantity');
            $table->integer('From')->unsigned()->references('id')->on('profiles');
            $table->integer('To')->unsigned()->references('id')->on('profiles');
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
        Schema::dropIfExists('bills');
    }
}
