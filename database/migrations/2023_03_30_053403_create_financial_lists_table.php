<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFinancialListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('financial_particulars_id');
            $table->string('financial_years_id');
            $table->string('en_value');
            $table->string('bn_value');
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
        Schema::drop('financial_lists');
    }
}
