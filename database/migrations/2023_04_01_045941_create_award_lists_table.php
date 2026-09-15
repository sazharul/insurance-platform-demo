<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAwardListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('award_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon')->nullable();
            $table->string('en_title');
            $table->string('bn_title');
            $table->longText('en_award_details');
            $table->longText('bn_award_details');
            $table->string('image')->nullable();
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
        Schema::drop('award_lists');
    }
}
