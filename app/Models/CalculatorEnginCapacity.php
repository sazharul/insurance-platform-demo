<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorEnginCapacity extends Model {
    use HasFactory;
    protected $guarded = [];
    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function calculatorVehicleCategory() {
        return $this->belongsTo(CalculatorVehicleCategory::class);
    }

    public function calculatorVehicleType() {
        return $this->hasOne(CalculatorVehicleType::class, 'id', 'calculator_vehicle_type_id');
    }
}
