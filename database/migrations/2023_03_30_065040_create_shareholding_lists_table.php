<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShareholdingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareholding_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_name');
            $table->string('bn_name');
            $table->string('en_status');
            $table->string('bn_status');
            $table->string('en_shares_no');
            $table->string('bn_shares_no');
            $table->string('en_shares_percentage');
            $table->string('bn_shares_percentage');
            $table->integer('position');
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
        Schema::drop('shareholding_lists');
    }
}
