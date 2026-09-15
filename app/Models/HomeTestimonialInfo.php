<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTestimonialInfo extends Model
{
    use HasFactory;
    protected $fillable = ['en_testimonial_title','bn_testimonial_title','en_testimonial_description','bn_testimonial_description'];
}
