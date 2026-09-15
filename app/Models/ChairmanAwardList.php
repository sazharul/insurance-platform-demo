<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChairmanAwardList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chairman_award_lists';

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
    protected $fillable = ['chairman_profile_id', 'image', 'en_year', 'bn_year', 'en_title', 'bn_title', 'en_description', 'bn_description', 'status'];

    
}
