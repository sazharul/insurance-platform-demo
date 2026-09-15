<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'board_members';

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
    protected $fillable = ['board_cat_id', 'designation_id', 'en_name', 'bn_name', 'image', 'en_details', 'bn_details', 'position', 'status'];

    public function designation()
    {
        return $this->belongsTo(Designation::class,'designation_id','id');
    }

    public function boardCategory()
    {
        return $this->hasOne(BoardCategory::class,'id','board_cat_id');
    }
}
