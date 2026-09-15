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
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('en_company_name');
            $table->string('bn_company_name');
            $table->string('email')->nullable();
            $table->string('en_about');
            $table->string('bn_about');
            $table->string('en_address')->nullable();
            $table->string('bn_address')->nullable();
            $table->string('en_phone_one');
            $table->string('bn_phone_one');
            $table->string('en_phone_two')->nullable();
            $table->string('bn_phone_two')->nullable();
            $table->string('en_hotline')->nullable();
            $table->string('bn_hotline')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('play_small_icon')->nullable();
            $table->string('i_small_icon')->nullable();
            $table->string('play_link')->nullable();
            $table->string('i_link')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('pinterest')->nullable();
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
        Schema::dropIfExists('contact_infos');
    }
};
