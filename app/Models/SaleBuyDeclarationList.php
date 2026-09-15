<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleBuyDeclarationList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sale_buy_declaration_lists';

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
    protected $fillable = ['icon', 'en_name', 'bn_name', 'en_details', 'bn_details','position', 'status'];


}
