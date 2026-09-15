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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb1');
            $table->string('bn_breadcrumb1');
            $table->string('en_breadcrumb2');
            $table->string('bn_breadcrumb2');
            $table->string('en_claim_heading');
            $table->string('bn_claim_heading');
            $table->string('en_statement_head');
            $table->string('bn_statement_head');
            $table->text('claim_img');
            $table->longText('en_claim_description');
            $table->longText('bn_claim_description');
            $table->longText('en_claim_state_des');
            $table->longText('bn_claim_state_des');
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
        Schema::dropIfExists('claims');
    }
};
