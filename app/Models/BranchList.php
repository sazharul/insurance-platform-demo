<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'branch_lists';

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
    protected $fillable = ['branch_location_id', 'en_name', 'bn_name', 'en_address', 'bn_address', 'branch_map_url', 'en_employee_name', 'bn_employee_name', 'en_employee_designation', 'bn_employee_designation', 'en_contact_number', 'bn_contact_number', 'en_contact_number2', 'bn_contact_number2', 'image', 'status'];

    public function branchLocation()
    {
        return $this->belongsTo(BranchLocation::class,'branch_location_id','id');
    }

}
