<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorBuildingConstruction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function calculatorBuildingConstructionRoof()
    {
        return $this->hasMany(CalculatorBuildingConstructionRoof::class);
    }
}
