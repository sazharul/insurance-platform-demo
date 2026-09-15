<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeInvestorList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notice_investor_lists';

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
    protected $fillable = ['icon', 'en_year', 'bn_year', 'en_title', 'bn_title', 'en_details', 'bn_details', 'uploaded_date' ,'notice_file','status'];


}
