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
        Schema::create('calculator_bangabandhu_suraksha_bimas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calculator_id');
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_subtitle');
            $table->string('bn_subtitle');
            $table->string('en_hero_title1');
            $table->string('bn_hero_title1');
            $table->string('en_hero_subtitle1');
            $table->string('bn_hero_subtitle1');
            $table->string('en_hero_title2');
            $table->string('bn_hero_title2');
            $table->string('en_hero_subtitle2');
            $table->string('bn_hero_subtitle2');
            $table->string('en_hero_title3');
            $table->string('bn_hero_title3');
            $table->string('en_hero_subtitle3');
            $table->string('bn_hero_subtitle3');
            $table->string('en_hero_title4');
            $table->string('bn_hero_title4');
            $table->string('en_hero_subtitle4');
            $table->string('bn_hero_subtitle4');
            $table->string('capital_sum_insured')->comment('for multiple use coma: 200000, 40000');
            $table->string('net_premium');
            $table->string('vat');
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
        Schema::dropIfExists('calculator_bangabandhu_suraksha_bimas');
    }
};
