<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('calculator_id');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('calculator_name')->nullable();
            $table->longText('data')->nullable();
            $table->longText('data1')->nullable();
            $table->longText('data2')->nullable();
            $table->string('calculationType')->nullable();
            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('invoice_sessions');
    }
};
