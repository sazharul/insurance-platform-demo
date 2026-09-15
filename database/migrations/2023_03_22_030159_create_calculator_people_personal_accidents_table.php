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
        Schema::create('calculator_people_personal_accidents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calculator_id');
            $table->string('hero_image');
            $table->string('en_hero_title');
            $table->string('bn_hero_title');
            $table->string('en_hero_subtitle');
            $table->string('bn_hero_subtitle');

            $table->string('en_plan_type_name');
            $table->string('bn_plan_type_name');
            $table->string('color_image');
            $table->string('white_image');

            $table->string('capital_sum_insured')->comment('for multiple use coma: 200000, 40000');
            $table->string('net_premium');
            $table->string('vat');

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
        Schema::dropIfExists('calculator_people_personal_accidents');
    }
};
