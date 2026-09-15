<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTestimonial extends Model
{
    use HasFactory;
    protected $fillable = ['en_client_name','bn_client_name','en_client_designation','bn_client_designation','en_client_feedback','bn_client_feedback'];
}
