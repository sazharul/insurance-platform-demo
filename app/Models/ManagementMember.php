<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManagementMember extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'management_members';

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
    protected $fillable = ['management_name_id', 'image', 'en_name', 'bn_name', 'en_designation', 'bn_designation', 'en_department', 'bn_department', 'position', 'status'];


    public function managementInfo() {
        return $this->hasOne(ManagementName::class, 'id', 'management_name_id');
    }
}
