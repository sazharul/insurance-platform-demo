<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChairmanProfile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chairman_profiles';

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
    protected $fillable = ['en_title', 'bn_title', 'en_breadcrumb_1', 'bn_breadcrumb_1', 'en_breadcrumb_2', 'bn_breadcrumb_2', 'chairman_image', 'en_name', 'bn_name', 'en_designation', 'bn_designation', 'en_details', 'bn_details', 'en_involvement_title', 'bn_involvement_title', 'en_awards_title', 'bn_awards_title'];

    
}
