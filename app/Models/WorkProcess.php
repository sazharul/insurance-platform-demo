<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkProcess extends Model
{
    use HasFactory;
    protected $fillable = ['wp_first_icon','en_wp_first_title','bn_wp_first_title','en_wp_first_description','bn_wp_first_description','wp_sec_icon','en_wp_sec_title','bn_wp_sec_title','en_wp_sec_description','bn_wp_sec_description','en_wp_third_icon','en_wp_third_title','bn_wp_third_title','en_wp_third_description','bn_wp_third_description','wp_forth_icon','en_wp_forth_title','bn_wp_forth_title','en_wp_forth_description','bn_wp_forth_description'];
}
