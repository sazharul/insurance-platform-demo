<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalculatorMotorTariffPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculator_motor_tariff_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('insurance_type')->default('Comprehensive');
            $table->unsignedBigInteger('vehicle_category_id');
            $table->unsignedBigInteger('vehicle_type_id');
            $table->integer('capacity_from')->default(0);
            $table->integer('capacity_to')->default(9999);
            $table->decimal('weight_from', 8, 2)->nullable();
            $table->decimal('weight_to', 8, 2)->nullable();
            $table->decimal('price', 12, 2);
            $table->tinyInteger('status')->default(1);
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
        Schema::drop('calculator_motor_tariff_prices');
    }
}
