<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorCashInSafeTeriff extends Model {
    use HasFactory;
    protected $guarded = [];

    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function institute() {
        return $this->belongsTo(CalculatorInstitutionType::class,'calculator_institute_type_id','id');
    }

    public function propertyLocation() {
        return $this->belongsTo(CalculatorPropertyLocation::class,'calculator_property_location_id','id');
    }

    public function buildingConstruction() {
        return $this->belongsTo(CalculatorBuildingConstruction::class,'calculator_building_construction_id','id');
    }

    public function srcc() {
        return $this->belongsTo(CalculatorStrikeRiotCivilCommotion::class, 'srcc_id', 'id');
    }
}
