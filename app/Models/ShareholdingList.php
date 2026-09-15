<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareholdingList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shareholding_lists';

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
    protected $fillable = ['en_name', 'bn_name', 'en_status', 'bn_status', 'en_shares_no', 'bn_shares_no', 'en_shares_percentage', 'bn_shares_percentage','position'];


}
