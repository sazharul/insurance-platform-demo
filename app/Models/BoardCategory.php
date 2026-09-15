<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'board_categories';

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
    protected $fillable = ['en_name', 'bn_name', 'status'];

    public function boardMember()
    {
        return $this->hasMany(BoardMember::class,'board_cat_id','id')->orderBy('position','asc')->where('status', 1);
    }
}
