<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MujibGallery extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mujib_galleries';

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
    protected $fillable = ['en_title', 'bn_title', 'image', 'status'];

    
}
