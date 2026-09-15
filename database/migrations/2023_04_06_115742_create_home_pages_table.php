<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('year_log')->nullable();
            $table->string('location_icon')->nullable();
            $table->string('en_location')->nullable();
            $table->string('bn_location')->nullable();
            $table->string('main_logo')->nullable();
            $table->string('en_motto')->nullable();
            $table->string('bn_motto')->nullable();
            $table->string('en_hot_line')->nullable();
            $table->string('bn_hot_line')->nullable();
            $table->string('en_title')->nullable();
            $table->string('bn_title')->nullable();
            $table->string('en_description')->nullable();
            $table->string('bn_description')->nullable();
            $table->string('slider1')->nullable();
            $table->string('slider2')->nullable();
            $table->string('slider3')->nullable();
            $table->string('en_online_calculator_title')->nullable();
            $table->string('bn_online_calculator_title')->nullable();
            $table->string('en_online_calculator_description')->nullable();
            $table->string('bn_online_calculator_description')->nullable();
            $table->string('en_work_process_title')->nullable();
            $table->string('bn_work_process_title')->nullable();
            $table->string('en_work_process_description')->nullable();
            $table->string('bn_work_process_description')->nullable();
            $table->text('en_work_process_list')->nullable();
            $table->text('bn_work_process_list')->nullable();
            $table->string('en_about_title')->nullable();
            $table->string('bn_about_title')->nullable();
            $table->string('en_about_description')->nullable();
            $table->string('bn_about_description')->nullable();
            $table->string('en_about_text')->nullable();
            $table->string('bn_about_text')->nullable();
            $table->text('en_about_slider_list')->nullable();
            $table->text('bn_about_slider_list')->nullable();
            $table->string('en_view_all_notice')->nullable();
            $table->string('bn_view_all_notice')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('en_footer_logo_description')->nullable();
            $table->string('bn_footer_logo_description')->nullable();
            $table->string('play_store_icon')->nullable();
            $table->string('play_store_link')->nullable();
            $table->string('footer_pabx')->nullable();
            $table->string('footer_hotline')->nullable();
            $table->string('en_foot_product')->nullable();
            $table->string('bn_foot_product')->nullable();
            $table->text('en_foot_product_list1')->nullable();
            $table->text('bn_foot_product_list1')->nullable();
            $table->text('en_foot_product_list2')->nullable();
            $table->text('bn_foot_product_list2')->nullable();
            $table->text('en_foot_product_list3')->nullable();
            $table->text('bn_foot_product_list3')->nullable();
            $table->text('en_foot_product_list4')->nullable();
            $table->text('bn_foot_product_list4')->nullable();
            $table->text('en_foot_product_list5')->nullable();
            $table->text('bn_foot_product_list5')->nullable();
            $table->string('en_foot_about')->nullable();
            $table->string('bn_foot_about')->nullable();
            $table->text('en_foot_about_list1')->nullable();
            $table->text('bn_foot_about_list1')->nullable();
            $table->text('en_foot_about_list2')->nullable();
            $table->text('bn_foot_about_list2')->nullable();
            $table->text('en_foot_about_list3')->nullable();
            $table->text('bn_foot_about_list3')->nullable();
            $table->text('en_foot_about_list4')->nullable();
            $table->text('bn_foot_about_list4')->nullable();
            $table->text('en_foot_about_list5')->nullable();
            $table->text('bn_foot_about_list5')->nullable();
            $table->string('en_foot_legal')->nullable();
            $table->string('bn_foot_legal')->nullable();
            $table->text('en_foot_legal_list1')->nullable();
            $table->text('bn_foot_legal_list1')->nullable();
            $table->text('en_foot_legal_list2')->nullable();
            $table->text('bn_foot_legal_list2')->nullable();
            $table->string('en_all_rights_reserved')->nullable();
            $table->string('bn_all_rights_reserved')->nullable();
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
        Schema::drop('home_pages');
    }
}
