<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMissionVisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_visions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb_1');
            $table->string('bn_breadcrumb_1');
            $table->string('en_breadcrumb_2');
            $table->string('bn_breadcrumb_2');
            $table->string('main_image')->nullable();
            $table->text('en_details');
            $table->text('bn_details');
            $table->string('en_mission_title');
            $table->string('bn_mission_title');
            $table->string('mission_image')->nullable();
            $table->string('en_mission_info_1');
            $table->string('bn_mission_info_1');
            $table->string('en_mission_info_2');
            $table->string('bn_mission_info_2');
            $table->string('en_vision_title');
            $table->string('bn_vision_title');
            $table->string('vision_image')->nullable();
            $table->string('en_vision_info_1');
            $table->string('bn_vision_info_1');
            $table->string('en_vision_info_2');
            $table->string('bn_vision_info_2');
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
        Schema::drop('mission_visions');
    }
}
