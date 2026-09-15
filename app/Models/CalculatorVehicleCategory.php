<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorVehicleCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function CalculatorVehicleType()
    {
        return $this->hasMany(CalculatorVehicleType::class, 'calculator_vehicle_category_id', 'id');
    }

    public function CalculatorEnginCapacity()
    {
        return $this->hasMany(CalculatorEnginCapacity::class, 'calculator_vehicle_category_id', 'id');
    }

}
