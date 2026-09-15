<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManagementMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('management_name_id')->nullable();
            $table->string('image')->nullable();
            $table->string('en_name');
            $table->string('bn_name');
            $table->string('en_designation');
            $table->string('bn_designation');
            $table->string('en_department');
            $table->string('bn_department');
            $table->string('position');
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
        Schema::drop('management_members');
    }
}
