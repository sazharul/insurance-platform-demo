<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculationFireAdditionalCoverage extends Model {
    use HasFactory;
    protected $guarded = [];

    public function subcoverage() {
        return $this->hasMany(CalculationFireAdditionalCoverage::class);
    }

    public function additionalCoverage() {
        return $this->belongsTo(CalculatorAdditionalCoverage::class, 'additional_coverage_id', 'id');
    }

    public function location() {
        return $this->belongsTo(CalculatorPropertyLocation::class, 'location_id', 'id');
    }

    public function member() {
        return $this->belongsTo(CalculatorMemberAssociation::class, 'member_id', 'id');
    }

    public function building() {
        return $this->belongsTo(CalculatorBuildingConstruction::class, 'building_construction_id', 'id');
    }

    public function district() {
        return $this->belongsTo(CalculatorInsuranceDistrict::class, 'district_id', 'id');
    }

    public function additionalSubcoverage() {
        return $this->belongsTo(CalculationFireAdditionalSubcoverage::class);
    }
}
