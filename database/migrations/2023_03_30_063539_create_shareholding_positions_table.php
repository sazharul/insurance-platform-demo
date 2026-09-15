<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShareholdingPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareholding_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb_1');
            $table->string('bn_breadcrumb_1');
            $table->string('en_breadcrumb_2');
            $table->string('bn_breadcrumb_2');
            $table->string('en_heading');
            $table->string('bn_heading');
            $table->string('en_sub_heading');
            $table->longText('bn_sub_heading');
            $table->string('en_table_name');
            $table->string('bn_table_name');
            $table->string('en_table_status');
            $table->string('bn_table_status');
            $table->string('en_table_of_shares');
            $table->string('bn_table_of_shares');
            $table->string('en_table_of_share_in');
            $table->string('bn_table_of_share_in');
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
        Schema::drop('shareholding_positions');
    }
}
