<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNoticeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->text('icon');
            $table->string('en_title');
            $table->string('bn_title');
            $table->longText('en_details');
            $table->longText('bn_details');
            $table->string('en_year')->nullable();
            $table->string('bn_year')->nullable();
            $table->text('notice_file');
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
        Schema::drop('notice_lists');
    }
}
