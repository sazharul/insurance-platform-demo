<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteeBoardMember extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'committee_board_members';

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
    protected $fillable = ['committee_name_id', 'profile_image', 'en_designation', 'bn_designation', 'en_name', 'bn_name', 'link_owner_name_id', 'position', 'status'];


    public function commiteeInfo()
    {
        return $this->hasOne(CommitteeName::class, 'id', 'committee_name_id');
    }
}
