<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branch_location_id');
            $table->string('en_name');
            $table->string('bn_name');
            $table->string('en_address')->nullable();
            $table->string('bn_address')->nullable();
            $table->string('branch_map_url');
            $table->string('en_employee_name');
            $table->string('bn_employee_name');
            $table->string('en_employee_designation');
            $table->string('bn_employee_designation');
            $table->string('en_contact_number');
            $table->string('bn_contact_number');
            $table->string('en_contact_number2')->nullable();
            $table->string('bn_contact_number2')->nullable();
            $table->text('image');
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
        Schema::drop('branch_lists');
    }
}
