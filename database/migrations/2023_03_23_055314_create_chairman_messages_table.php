<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChairmanMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chairman_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb_1');
            $table->string('bn_breadcrumb_1');
            $table->string('en_breadcrumb_2');
            $table->string('bn_breadcrumb_2');
            $table->string('image');
            $table->string('en_name');
            $table->string('bn_name');
            $table->string('en_designation');
            $table->string('bn_designation');
            $table->text('en_details');
            $table->text('bn_details');
            $table->string('signature_img');
            $table->string('arabic_img');
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
        Schema::drop('chairman_messages');
    }
}
