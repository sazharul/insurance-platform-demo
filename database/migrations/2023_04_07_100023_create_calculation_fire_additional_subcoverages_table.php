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
        Schema::create('calculation_fire_additional_subcoverages', function (Blueprint $table) {
            $table->id();
            $table->integer('calculation_fire_additional_coverage_id');
            $table->string('en_name');
            $table->string('bn_name');
            $table->string('type');
            $table->integer('district_id');
            $table->float('value');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('calculation_fire_additional_subcoverages');
    }
};
