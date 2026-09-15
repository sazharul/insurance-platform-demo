<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengerPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('passenger_price')->nullable();
            $table->string('self_driver_price')->nullable();
            $table->string('paid_driver_price')->nullable();
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
        Schema::drop('passenger_prices');
    }
}
