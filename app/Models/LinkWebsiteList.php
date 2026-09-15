<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkWebsiteList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'link_website_lists';

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
    protected $fillable = ['image', 'en_title', 'bn_title', 'url', 'status'];

    
}
