<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'home_pages';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'phone', 'mobile', 'facebook_link', 'youtube_link', 'year_log', 'location_icon', 'en_location', 'bn_location', 'main_logo', 'en_motto', 'bn_motto', 'en_hot_line', 'bn_hot_line', 'en_title', 'bn_title', 'en_description', 'bn_description', 'slider1', 'slider2', 'slider3', 'en_online_calculator_title', 'bn_online_calculator_title', 'en_online_calculator_description', 'bn_online_calculator_description', 'en_work_process_title', 'bn_work_process_title', 'en_work_process_description', 'bn_work_process_description', 'en_work_process_list', 'bn_work_process_list', 'en_about_title', 'bn_about_title', 'en_about_description', 'bn_about_description', 'en_about_text', 'bn_about_text', 'en_about_slider_list', 'bn_about_slider_list', 'en_view_all_notice', 'bn_view_all_notice', 'footer_logo', 'en_footer_logo_description', 'bn_footer_logo_description', 'play_store_icon', 'play_store_link', 'footer_pabx', 'footer_hotline', 'en_foot_product', 'bn_foot_product', 'en_foot_product_list1', 'bn_foot_product_list1', 'en_foot_product_list2', 'bn_foot_product_list2', 'en_foot_product_list3', 'bn_foot_product_list3', 'en_foot_product_list4', 'bn_foot_product_list4', 'en_foot_product_list5', 'bn_foot_product_list5', 'en_foot_about', 'bn_foot_about', 'en_foot_about_list1', 'bn_foot_about_list1', 'en_foot_about_list2', 'bn_foot_about_list2', 'en_foot_about_list3', 'bn_foot_about_list3', 'en_foot_about_list4', 'bn_foot_about_list4', 'en_foot_about_list5', 'bn_foot_about_list5', 'en_foot_legal', 'bn_foot_legal',  'en_foot_legal_list1', 'bn_foot_legal_list1', 'en_foot_legal_list2', 'bn_foot_legal_list2', 'en_all_rights_reserved', 'bn_all_rights_reserved'];


}
