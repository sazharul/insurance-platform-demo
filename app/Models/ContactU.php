<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactU extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contact_uses';

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
    protected $fillable = ['en_title', 'bn_title', 'en_breadcrumb_1', 'bn_breadcrumb_1', 'en_breadcrumb_2', 'bn_breadcrumb_2', 'en_heading', 'bn_heading', 'location_icon', 'en_location_title', 'bn_location_title', 'en_location_address', 'bn_location_address', 'email_icon', 'en_email_title', 'bn_email_title', 'en_email_address', 'bn_email_address', 'hotline_icon', 'en_hotline_title', 'bn_hotline_title', 'en_hotline_address', 'bn_hotline_address', 'en_btn_text', 'bn_btn_text'];

    
}
