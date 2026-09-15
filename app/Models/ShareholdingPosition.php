<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareholdingPosition extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shareholding_positions';

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
    protected $fillable = ['en_title', 'bn_title', 'en_breadcrumb_1', 'bn_breadcrumb_1', 'en_breadcrumb_2', 'bn_breadcrumb_2', 'en_heading', 'bn_heading', 'en_sub_heading', 'bn_sub_heading', 'en_table_name', 'bn_table_name', 'en_table_status', 'bn_table_status', 'en_table_of_shares', 'bn_table_of_shares', 'en_table_of_share_in', 'bn_table_of_share_in'];

    
}
