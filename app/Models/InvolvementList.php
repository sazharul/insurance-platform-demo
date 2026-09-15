<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvolvementList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'involvement_lists';

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
    protected $fillable = ['chairman_profile_id', 'en_designation', 'bn_designation', 'en_company_name', 'bn_company_name', 'en_details_name', 'bn_details_name', 'position', 'status'];


}
