<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'financial_lists';

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
    protected $fillable = [
        'financial_particulars_id',
        'financial_years_id',
        'en_value',
        'bn_value'
    ];


}
