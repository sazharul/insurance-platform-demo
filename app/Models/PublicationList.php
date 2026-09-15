<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicationList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'publication_lists';

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
    protected $fillable = ['en_date','bn_date','en_title', 'bn_title', 'image', 'en_details', 'bn_details', 'en_newspaper_name', 'bn_newspaper_name', 'status'];


}
