<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingDividend extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pending_dividends';

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
    protected $fillable = ['en_title', 'bn_title', 'en_breadcrumb_1', 'bn_breadcrumb_1', 'en_breadcrumb_2', 'bn_breadcrumb_2', 'pdf_file', 'en_btn_text', 'bn_btn_text'];

    
}
