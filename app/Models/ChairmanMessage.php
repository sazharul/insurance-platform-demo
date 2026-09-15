<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChairmanMessage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chairman_messages';

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
    protected $fillable = ['en_title', 'bn_title', 'en_breadcrumb_1', 'bn_breadcrumb_1', 'en_breadcrumb_2', 'bn_breadcrumb_2', 'image', 'en_name', 'bn_name', 'en_designation', 'bn_designation', 'en_details', 'bn_details', 'signature_img', 'arabic_img'];

    
}
