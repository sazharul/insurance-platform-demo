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
        Schema::create('personal_awards', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->text('image');
            $table->string('en_year');
            $table->string('bn_year');
            $table->string('en_name');
            $table->string('bn_name');
            $table->string('en_recognition');
            $table->string('bn_recognition');
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
        Schema::dropIfExists('personal_awards');
    }
};
