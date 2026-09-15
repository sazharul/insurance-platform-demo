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
        Schema::create('calculator_engin_capacities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('calculator_vehicle_category_id');
            $table->unsignedInteger('calculator_vehicle_type_id');
            $table->string('capacity_from')->nullable();
            $table->string('capacity_to')->nullable();
            $table->string('tons')->nullable();
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
        Schema::dropIfExists('calculator_engin_capacities');
    }
};
