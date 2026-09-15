<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'company_profiles';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array en_maintaining_list
     */

    public function getEnMaintainingListAttribute($value)
    {
        return json_decode($value);
    }

    public function getBnMaintainingListAttribute($value)
    {
        return json_decode($value);
    }

    //en_value_details
    public function getEnValueDetailsAttribute($value)
    {
        return json_decode($value);
    }

    public function getBnValueDetailsAttribute($value)
    {
        return json_decode($value);
    }

    //en_asset_details
    public function getEnAssetDetailsAttribute($value)
    {
        return json_decode($value);
    }

    public function getBnAssetDetailsAttribute($value)
    {
        return json_decode($value);
    }

    //en_sponsor_details
    public function getEnSponsorDetailsAttribute($value)
    {
        return json_decode($value);
    }

    public function getBnSponsorDetailsAttribute($value)
    {
        return json_decode($value);
    }

    protected $fillable = ['company_image',
        'en_company_details',
        'bn_company_details',
        'en_maintain_title',
        'bn_maintain_title',
        'en_maintaining_list',
        'bn_maintaining_list',
        'building_img',
        'en_register_name',
        'bn_register_name',
        'en_register_title',
        'bn_register_title',
        'en_register_office',
        'bn_register_office',
        'en_register_address',
        'bn_register_address',
        'incorporation_icon',
        'en_incorporation_title',
        'bn_incorporation_title',
        'en_incorporation_date',
        'bn_incorporation_date',
        'en_commencement_of_business',
        'bn_commencement_of_business',
        'en_commencement_of_date',
        'bn_commencement_of_date',
        'en_listing_stock_dh',
        'bn_listing_stock_dh',
        'en_listing_stock_dh_date',
        'bn_listing_stock_dh_date',
        'en_listing_stock_ch',
        'bn_listing_stock_ch',
        'en_listing_stock_ch_date',
        'bn_listing_stock_ch_date',
        'en_allotment_of_public',
        'bn_allotment_of_public',
        'en_allotment_of_public_date',
        'bn_allotment_of_public_date',
        'capital_icon',
        'en_paid_capital_title',
        'bn_paid_capital_title',
        'en_paid_capital_info',
        'bn_paid_capital_info',
        'en_authorized_capital_title',
        'bn_authorized_capital_title',
        'en_authorized_capital_info',
        'bn_authorized_capital_info',
        'en_value_details',
        'bn_value_details',
        'en_asset_details',
        'bn_asset_details',
        'sponsor_image_thumbnail',
        'en_sponsor_title',
        'bn_sponsor_title',
        'en_sponsor_details',
        'bn_sponsor_details'
    ];


}
