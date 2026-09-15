<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_name');
            $table->string('bn_name');
            $table->string('designation_id')->nullable();
            $table->string('en_address')->nullable();
            $table->string('bn_address')->nullable();
            $table->string('department_id')->nullable();
            $table->string('en_phone_number')->nullable();
            $table->string('bn_phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('profile_image')->nullable();
            $table->integer('position');
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
        Schema::drop('employee_lists');
    }
}
