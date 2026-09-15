<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManagementName extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'management_names';

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
    protected $fillable = ['en_name', 'bn_name', 'position', 'status'];

    public function memberInfo() {
        return $this->hasMany(ManagementMember::class, 'management_name_id', 'id')->orderBy('position', 'asc');
    }
}
