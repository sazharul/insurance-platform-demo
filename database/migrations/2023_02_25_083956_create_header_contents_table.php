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
        Schema::create('header_contents', function (Blueprint $table) {
            $table->id();
            $table->string('en_header_title');
            $table->string('bn_header_title');
            $table->longText('en_short_description');
            $table->longText('bn_short_description');
            $table->text('header_img_one');
            $table->text('header_img_two');
            $table->text('header_img_three');
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
        Schema::dropIfExists('header_contents');
    }
};
