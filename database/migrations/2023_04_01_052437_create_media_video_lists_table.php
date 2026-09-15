<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaVideoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_video_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title');
            $table->string('bn_title');
            $table->longText('video')->nullable();
            $table->longText('image')->nullable();
            $table->string('en_date');
            $table->string('bn_date');
            $table->string('status')->nullable()->default(1);
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
        Schema::drop('media_video_lists');
    }
}
