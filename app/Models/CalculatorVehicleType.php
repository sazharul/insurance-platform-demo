<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorVehicleType extends Model {
    use HasFactory;
    protected $guarded = [];
    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function calculatorVehicleCategory() {
        return $this->belongsTo(CalculatorVehicleCategory::class);
    }

    public function CalculatorEnginCapacity()
    {
        return $this->hasMany(CalculatorEnginCapacity::class, 'calculator_vehicle_type_id', 'id');
    }
}
