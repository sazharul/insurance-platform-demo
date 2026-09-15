<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    public function branch_employee()
    {
        return $this->hasMany(BranchEmployee::class, 'branch_id', 'id');
    }
}
