<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaImageList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'media_image_lists';

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

    public function groupImage()
    {
        return $this->hasMany(MedialImageGroup::class, 'group_id', 'id');
    }

}
