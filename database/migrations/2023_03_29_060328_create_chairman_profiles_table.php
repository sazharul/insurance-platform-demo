<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChairmanProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chairman_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb_1');
            $table->string('bn_breadcrumb_1');
            $table->string('en_breadcrumb_2');
            $table->string('bn_breadcrumb_2');
            $table->string('chairman_image')->nullable();
            $table->string('en_name');
            $table->string('bn_name');
            $table->string('en_designation');
            $table->string('bn_designation');
            $table->text('en_details');
            $table->text('bn_details');
            $table->string('en_involvement_title');
            $table->string('bn_involvement_title');
            $table->string('en_awards_title');
            $table->string('bn_awards_title');
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
        Schema::drop('chairman_profiles');
    }
}
