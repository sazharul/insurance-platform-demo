<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_uses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb_1');
            $table->string('bn_breadcrumb_1');
            $table->string('en_breadcrumb_2');
            $table->string('bn_breadcrumb_2');
            $table->string('en_heading');
            $table->string('bn_heading');
            $table->string('location_icon');
            $table->string('en_location_title');
            $table->string('bn_location_title');
            $table->string('en_location_address');
            $table->string('bn_location_address');
            $table->string('email_icon');
            $table->string('en_email_title');
            $table->string('bn_email_title');
            $table->string('en_email_address');
            $table->string('bn_email_address');
            $table->string('hotline_icon');
            $table->string('en_hotline_title');
            $table->string('bn_hotline_title');
            $table->string('en_hotline_address');
            $table->string('bn_hotline_address');
            $table->string('en_btn_text');
            $table->string('bn_btn_text');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contact_uses');
    }
}
