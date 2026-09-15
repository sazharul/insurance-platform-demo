<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorRelationDepartment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'investor_relation_departments';

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
    protected $fillable = ['en_title', 'bn_title', 'en_breadcrumb_1', 'bn_breadcrumb_1', 'en_breadcrumb_2', 'bn_breadcrumb_2', 'en_heading', 'bn_heading', 'en_description', 'bn_description'];


}
