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
        Schema::create('calculator_cash_in_safe_teriffs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calculator_id');
            $table->unsignedBigInteger('calculator_institute_type_id');
            $table->unsignedBigInteger('calculator_property_location_id');
            $table->unsignedBigInteger('srcc_id');
            $table->unsignedBigInteger('calculator_building_construction_id');
            $table->unsignedInteger('value');
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
        Schema::dropIfExists('calculator_cash_in_safe_teriffs');
    }
};
