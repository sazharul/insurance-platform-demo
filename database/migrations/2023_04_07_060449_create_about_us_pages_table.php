<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAboutUsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb_1');
            $table->string('bn_breadcrumb_1');
            $table->string('en_breadcrumb_2');
            $table->string('bn_breadcrumb_2');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->longText('en_description');
            $table->longText('bn_description');
            $table->string('en_core_title');
            $table->string('bn_core_title');
            $table->longText('en_left_core_description');
            $table->longText('bn_left_core_description');
            $table->string('core_image');
            $table->longText('en_right_core_description');
            $table->longText('bn_right_core_description');
            $table->string('en_process_title');
            $table->string('bn_process_title');
            $table->longText('en_process_description');
            $table->longText('bn_process_description');
            $table->string('process_image')->nullable();
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
        Schema::drop('about_us_pages');
    }
}
