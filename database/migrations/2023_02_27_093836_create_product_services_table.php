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
        Schema::create('product_services', function (Blueprint $table) {
            $table->id();
            $table->text('en_title');
            $table->string('slug')->unique();
            $table->text('bn_title');
            $table->text('en_short_description');
            $table->text('bn_short_description');
            $table->text('hero_image');
            $table->text('white_icon');
            $table->text('color_icon');
            $table->text('image');
            $table->text('insurance_process_image');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('product_services');
    }
};
