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
        Schema::create('calculator_building_constructions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calculator_id');
            $table->string('en_class_title');
            $table->string('bn_class_title');
            $table->string('en_hero_title');
            $table->string('bn_hero_title');
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
        Schema::dropIfExists('calculator_building_constructions');
    }
};
