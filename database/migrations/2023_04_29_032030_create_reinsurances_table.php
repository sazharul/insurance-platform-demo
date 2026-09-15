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
        Schema::create('reinsurances', function (Blueprint $table) {
            $table->id();
            $table->string('en_title');
            $table->string('bn_title');
            $table->string('en_breadcrumb1');
            $table->string('bn_breadcrumb1');
            $table->string('en_breadcrumb2');
            $table->string('bn_breadcrumb2');
            $table->text('reinsurance_hero_img');
            $table->longText('en_reinsurance_description');
            $table->longText('bn_reinsurance_description');
            $table->longText('en_reinsurance_type_details');
            $table->longText('bn_reinsurance_type_details');
            $table->longText('en_reinsurance_type_details2');
            $table->longText('bn_reinsurance_type_details2');
            $table->string('en_reinsurance_percentage');
            $table->string('bn_reinsurance_percentage');
            $table->longText('en_percentage_description');
            $table->longText('bn_percentage_description');
            $table->longText('en_reinsurance_type_details3');
            $table->longText('bn_reinsurance_type_details3');
            $table->string('en_reinsurance_coverage_title');
            $table->string('bn_reinsurance_coverage_title');
            $table->text('reinsurance_coverage_img');
            $table->string('en_reinsurance_broker_title');
            $table->string('bn_reinsurance_broker_title');
            $table->text('reinsurance_broker_img');
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
        Schema::dropIfExists('reinsurances');
    }
};
