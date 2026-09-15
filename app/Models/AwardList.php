<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AwardList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'award_lists';

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
    protected $fillable = ['icon', 'en_title', 'bn_title','en_award_details', 'bn_award_details', 'image', 'status'];


}
