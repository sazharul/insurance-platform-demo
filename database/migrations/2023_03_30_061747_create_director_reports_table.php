<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDirectorReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb_1');
            $table->string('bn_breadcrumb_1');
            $table->string('en_breadcrumb_2');
            $table->string('bn_breadcrumb_2');
            $table->string('en_btn_text');
            $table->string('bn_btn_text');
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
        Schema::drop('director_reports');
    }
}
