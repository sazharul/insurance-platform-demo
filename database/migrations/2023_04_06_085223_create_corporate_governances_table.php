<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporateGovernancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_governances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb_1');
            $table->string('bn_breadcrumb_1');
            $table->string('en_breadcrumb_2');
            $table->string('bn_breadcrumb_2');
            $table->string('en_subject')->nullable();
            $table->string('bn_subject')->nullable();
            $table->string('pdf_file')->nullable();
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
        Schema::drop('corporate_governances');
    }
}
