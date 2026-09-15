<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaVideoList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'media_video_lists';

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
    protected $fillable = ['en_title', 'bn_title', 'video', 'image', 'en_date', 'bn_date', 'status'];


}
