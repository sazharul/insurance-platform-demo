<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceSensitiveListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_sensitive_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_year')->nullable();
            $table->string('bn_year')->nullable();
            $table->string('created_at');
            $table->string('pdf_file')->nullable();
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
        Schema::drop('price_sensitive_lists');
    }
}
