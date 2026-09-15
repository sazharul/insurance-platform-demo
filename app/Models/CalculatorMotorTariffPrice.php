<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalculatorMotorTariffPrice extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'calculator_motor_tariff_prices';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function calculatorVehicleCategory() {
        return $this->hasOne(CalculatorVehicleCategory::class, 'id', 'vehicle_category_id');
    }

    public function calculatorVehicleType() {
        return $this->hasOne(CalculatorVehicleType::class, 'id', 'vehicle_type_id');
    }

    public function calculatorVehicleEngineCapacity() {
        return $this->hasOne(CalculatorEnginCapacity::class, 'id', 'engine_capacity_id');
    }
}
