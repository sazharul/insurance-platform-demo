<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvestorRelationDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_relation_departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb_1');
            $table->string('bn_breadcrumb_1');
            $table->string('en_breadcrumb_2');
            $table->string('bn_breadcrumb_2');
            $table->string('en_heading')->nullable();
            $table->string('bn_heading')->nullable();
            $table->longText('en_description');
            $table->longText('bn_description');
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
        Schema::drop('investor_relation_departments');
    }
}
