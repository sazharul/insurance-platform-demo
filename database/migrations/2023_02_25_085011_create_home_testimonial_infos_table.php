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
        Schema::create('home_testimonial_infos', function (Blueprint $table) {
            $table->id();
            $table->string('en_testimonial_title');
            $table->string('bn_testimonial_title');
            $table->longText('en_testimonial_description');
            $table->longText('bn_testimonial_description');
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
        Schema::dropIfExists('home_testimonial_infos');
    }
};
