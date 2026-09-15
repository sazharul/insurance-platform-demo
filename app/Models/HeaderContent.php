<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderContent extends Model
{
    use HasFactory;
    protected $fillable = ['en_header_title','bn_header_title','en_short_description','bn_short_description','header_img_one','header_img_two','header_img_three'];
}
