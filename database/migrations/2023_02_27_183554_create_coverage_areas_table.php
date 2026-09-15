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
        Schema::create('coverage_areas', function (Blueprint $table) {
            $table->id();
            $table->integer('product_service_id');
            $table->text('en_title');
            $table->text('bn_title');
            $table->text('en_short_description')->nullable();
            $table->text('bn_short_description')->nullable();
            $table->text('color_image');
            $table->text('white_image');
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
        Schema::dropIfExists('coverage_areas');
    }
};
