<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNoticeInvestorListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_investor_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon')->nullable();
            $table->string('en_year');
            $table->string('bn_year');
            $table->text('en_title');
            $table->text('bn_title');
            $table->longText('en_details')->nullable();
            $table->longText('bn_details')->nullable();
            $table->string('uploaded_date')->nullable();
            $table->text('notice_file');
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
        Schema::drop('notice_investor_lists');
    }
}
