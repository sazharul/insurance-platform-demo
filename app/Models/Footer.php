<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $fillable = ['en_footer_copyright','bn_footer_copyright','en_newsletter','bn_newsletter','en_newsletter_des','bn_newsletter_des'];
}
