<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('underwritings', function (Blueprint $table) {
            $table->id();
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb1');
            $table->string('bn_breadcrumb1');
            $table->string('en_breadcrumb2');
            $table->string('bn_breadcrumb2');
            $table->longText('en_under_des');
            $table->longText('bn_under_des');
            $table->string('en_exp_num');
            $table->string('bn_exp_num');
            $table->longText('en_under_des_last');
            $table->longText('bn_under_des_last');
            $table->text('underwriting_img');
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
        Schema::dropIfExists('underwritings');
    }
};
