<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorBuildingConstructionRoof extends Model {
    use HasFactory;
    protected $guarded = [];
    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function buildingType() {
        return $this->belongsTo(CalculatorBuildingConstruction::class,'calculator_building_construction_id','id');
    }
}
