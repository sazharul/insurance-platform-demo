<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectorReportList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'director_report_lists';

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
    protected $fillable = ['en_title', 'bn_title', 'en_year', 'bn_year', 'pdf_file', 'en_published_date', 'bn_published_date', 'status'];

    
}
