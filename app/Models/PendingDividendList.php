<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingDividendList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pending_dividend_lists';

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
    protected $fillable = ['en_title', 'bn_title', 'en_year', 'bn_year', 'pdf_file', 'status'];

    
}
