<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee_lists';

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
    protected $fillable = ['en_name', 'bn_name', 'designation_id', 'en_address', 'bn_address', 'department_id', 'en_phone_number', 'bn_phone_number', 'email', 'profile_image', 'position', 'status'];


    public function designation()
    {
        return $this->hasOne(Designation::class,'id','designation_id');
    }
    public function departmentInfo()
    {
        return $this->hasOne(Department::class,'id','department_id');
    }
}
