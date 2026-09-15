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
        Schema::create('claim_money', function (Blueprint $table) {
            $table->id();
            $table->string('en_claim_year');
            $table->string('bn_claim_year');
            $table->string('en_claim_money');
            $table->string('bn_claim_money');
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
        Schema::dropIfExists('claim_money');
    }
};
