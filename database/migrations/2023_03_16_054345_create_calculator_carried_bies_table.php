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
        Schema::create('calculator_carried_bies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calculator_id');
            $table->string('en_name');
            $table->string('bn_name');
            $table->string('color_image');
            $table->string('white_image');
            $table->string('charge_type')->nullable()->comment('1=>Fixed, 2=>Fraction');
            $table->integer('price_limit')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('next_price_limit')->nullable();
            $table->integer('next_amount')->nullable();
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
        Schema::dropIfExists('calculator_carried_bies');
    }
};
