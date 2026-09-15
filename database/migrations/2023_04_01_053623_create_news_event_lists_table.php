<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsEventListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_event_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_date');
            $table->string('bn_date');
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('image')->nullable();
            $table->longText('en_details');
            $table->longText('bn_details');
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
        Schema::drop('news_event_lists');
    }
}
