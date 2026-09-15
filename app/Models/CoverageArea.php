<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverageArea extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product_services()
    {
        return $this->belongsTo(ProductServices::class,'product_service_id','id');
    }
}
