<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_image');
            $table->text('en_company_details');
            $table->string('bn_company_details');
            $table->string('en_maintain_title')->nullable();
            $table->string('bn_maintain_title')->nullable();
            $table->text('en_maintaining_list')->nullable();
            $table->text('bn_maintaining_list')->nullable();
            $table->string('building_img')->nullable();
            $table->string('en_register_name')->nullable();
            $table->string('bn_register_name')->nullable();
            $table->string('en_register_title')->nullable();
            $table->string('bn_register_title')->nullable();
            $table->string('en_register_office')->nullable();
            $table->string('bn_register_office')->nullable();
            $table->string('en_register_address')->nullable();
            $table->string('bn_register_address')->nullable();
            $table->string('incorporation_icon')->nullable();
            $table->string('en_incorporation_title')->nullable();
            $table->string('bn_incorporation_title')->nullable();
            $table->string('en_incorporation_date')->nullable();
            $table->string('bn_incorporation_date')->nullable();
            $table->string('en_commencement_of_business')->nullable();
            $table->string('bn_commencement_of_business')->nullable();
            $table->string('en_commencement_of_date')->nullable();
            $table->string('bn_commencement_of_date')->nullable();
            $table->string('en_listing_stock_dh')->nullable();
            $table->string('bn_listing_stock_dh')->nullable();
            $table->string('en_listing_stock_dh_date')->nullable();
            $table->string('bn_listing_stock_dh_date')->nullable();
            $table->string('en_listing_stock_ch')->nullable();
            $table->string('bn_listing_stock_ch')->nullable();
            $table->string('en_listing_stock_ch_date')->nullable();
            $table->string('bn_listing_stock_ch_date')->nullable();
            $table->string('en_allotment_of_public')->nullable();
            $table->string('bn_allotment_of_public')->nullable();
            $table->string('en_allotment_of_public_date')->nullable();
            $table->string('bn_allotment_of_public_date')->nullable();
            $table->string('capital_icon')->nullable();
            $table->string('en_paid_capital_title')->nullable();
            $table->string('bn_paid_capital_title')->nullable();
            $table->string('en_paid_capital_info')->nullable();
            $table->string('bn_paid_capital_info')->nullable();
            $table->string('en_authorized_capital_title')->nullable();
            $table->string('bn_authorized_capital_title')->nullable();
            $table->string('en_authorized_capital_info')->nullable();
            $table->string('bn_authorized_capital_info')->nullable();
            $table->text('en_value_details')->nullable();
            $table->text('bn_value_details')->nullable();
            $table->text('en_asset_details')->nullable();
            $table->text('bn_asset_details')->nullable();
            $table->string('sponsor_image_thumbnail')->nullable();
            $table->text('en_sponsor_title')->nullable();
            $table->text('bn_sponsor_title')->nullable();
            $table->longText('en_sponsor_details')->nullable();
            $table->longText('bn_sponsor_details')->nullable();
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
        Schema::drop('company_profiles');
    }
}
