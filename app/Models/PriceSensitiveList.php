<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceSensitiveList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'price_sensitive_lists';

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
    protected $fillable = ['en_title', 'bn_title', 'en_year', 'bn_year', 'created_at', 'pdf_file', 'status'];


}
