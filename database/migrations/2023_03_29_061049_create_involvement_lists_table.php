<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvolvementListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('involvement_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chairman_profile_id');
            $table->string('en_designation');
            $table->string('bn_designation');
            $table->string('en_company_name');
            $table->string('bn_company_name');
            $table->string('en_details_name');
            $table->string('bn_details_name');
            $table->integer('position')->nullable();
            $table->string('status');
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
        Schema::drop('involvement_lists');
    }
}
