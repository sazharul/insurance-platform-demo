<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceMenu extends Model
{
    use HasFactory;
    protected $fillable = ['hhcm_icon', 'en_hhcm_menu','bn_hhcm_menu'];
}
