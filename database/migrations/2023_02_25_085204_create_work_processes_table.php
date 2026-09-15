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
        Schema::create('work_processes', function (Blueprint $table) {
            $table->id();
            $table->string('en_wp_first_title');
            $table->string('bn_wp_first_title');
            $table->longText('en_wp_first_description');
            $table->longText('bn_wp_first_description');
            $table->text('wp_first_icon');
            $table->string('en_wp_sec_title');
            $table->string('bn_wp_sec_title');
            $table->longText('en_wp_sec_description');
            $table->longText('bn_wp_sec_description');
            $table->text('wp_sec_icon');
            $table->string('en_wp_third_title');
            $table->string('bn_wp_third_title');
            $table->longText('en_wp_third_description');
            $table->longText('bn_wp_third_description');
            $table->text('wp_third_icon');
            $table->string('en_wp_forth_title');
            $table->string('bn_wp_forth_title');
            $table->longText('en_wp_forth_description');
            $table->longText('bn_wp_forth_description');
            $table->text('wp_forth_icon');
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
        Schema::dropIfExists('work_processes');
    }
};
