<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonelists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phonelists', function (Blueprint $table) {
            $table->id();
            $table->integer('Phone');
            $table->enum('Charge_Type',\App\Enums::chargeType);
            $table->enum('Status',\App\Enums::status);
            $table->enum('Provider',\App\Enums::providers);
            $table->integer('UsageLimit');
            $table->integer('API_Token');

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
        Schema::dropIfExists('phonelists');
    }
}
