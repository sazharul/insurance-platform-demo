<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSaleBuyDeclarationListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_buy_declaration_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon')->nullable();
            $table->string('en_name');
            $table->string('bn_name');
            $table->longText('en_details');
            $table->longText('bn_details');
            $table->longText('bn_details');
            $table->integer('position')->nullable();
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
        Schema::drop('sale_buy_declaration_lists');
    }
}
