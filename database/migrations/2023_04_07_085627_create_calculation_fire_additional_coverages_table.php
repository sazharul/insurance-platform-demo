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
        Schema::create('calculation_fire_additional_coverages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('additional_coverage_id');
            $table->tinyInteger('class_type')->comment('1=default,2=assign-calss');
            $table->unsignedBigInteger('building_construction_id');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->float('value');
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
        Schema::dropIfExists('calculation_fire_additional_coverages');
    }
};
