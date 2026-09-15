<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsOfShareholdingList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'details_of_shareholding_lists';

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
    protected $fillable = ['en_name', 'bn_name', 'en_shares_no', 'bn_shares_no', 'en_shares_percentage', 'bn_shares_percentage', 'pie_chart_color',
    'position'];


}
