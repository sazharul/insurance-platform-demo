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
        Schema::create('calculation_fire_interest_teriffs', function (Blueprint $table) {
            $table->id();
            $table->integer('location_id');
            $table->integer('building_construction_id');
            $table->unsignedBigInteger('member_association_id')->nullable();
            $table->unsignedBigInteger('occupation_id')->nullable();
            $table->float('value');
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
        Schema::dropIfExists('calculation_fire_interest_teriffs');
    }
};
