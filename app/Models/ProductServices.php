<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductServices extends Model {
    use HasFactory;

    protected $guarded = [];

    public function coverage() {
        return $this->hasMany(CoverageArea::class, 'product_service_id', 'id');
    }

    public function setEnServiceNameAttribute($value) {
        $this->attributes['en_service_name'] = $value;
        $this->attributes['slug']            = Str::slug($value);
    }
}
