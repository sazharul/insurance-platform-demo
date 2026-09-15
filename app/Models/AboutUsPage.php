<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsPage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'about_us_pages';

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

    //en_left_core_description
    public function getEnLeftCoreDescriptionAttribute($value)
    {
        return json_decode($value);
    }

    public function getBnLeftCoreDescriptionAttribute($value)
    {
        return json_decode($value);
    }

    //en_right_core_description
    public function getEnRightCoreDescriptionAttribute($value)
    {
        return json_decode($value);
    }

    public function getBnRightCoreDescriptionAttribute($value)
    {
        return json_decode($value);
    }

    //en_process_description
    public function getEnProcessDescriptionAttribute($value)
    {
        return json_decode($value);
    }

    public function getBnProcessDescriptionAttribute($value)
    {
        return json_decode($value);
    }


    protected $fillable = [
        'en_title',
        'bn_title',
        'en_breadcrumb_1',
        'bn_breadcrumb_1',
        'en_breadcrumb_2',
        'bn_breadcrumb_2',
        'image1',
        'image2',
        'en_description',
        'bn_description',
        'en_core_title',
        'bn_core_title',
        'en_left_core_description',
        'bn_left_core_description',
        'core_image',
        'en_right_core_description',
        'bn_right_core_description',
        'en_process_title',
        'bn_process_title',
        'en_process_description',
        'bn_process_description',
        'process_image'
    ];
}
