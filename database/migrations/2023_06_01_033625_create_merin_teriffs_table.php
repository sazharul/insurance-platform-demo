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
        Schema::create('merin_teriffs', function (Blueprint $table) {
            $table->id();
            $table->integer('cargo_product_id');
            $table->integer('member_id')->nullable();
            $table->integer('teriff_id');
            $table->integer('carried_by_id');
            $table->integer('risk_cover_id');
            $table->integer('value');
            $table->integer('status');
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
        Schema::dropIfExists('merin_teriffs');
    }
};
