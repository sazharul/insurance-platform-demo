<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChairmanAwardListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chairman_award_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chairman_profile_id');
            $table->string('image')->nullable();
            $table->string('en_year');
            $table->string('bn_year');
            $table->string('en_title');
            $table->string('bn_title');
            $table->text('en_description');
            $table->text('bn_description');
            $table->string('status');
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
        Schema::drop('chairman_award_lists');
    }
}
