<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Calculator extends Model {
    use HasFactory;
    protected $guarded = [];

    public function setEnNameAttribute($value) {
        $this->attributes['en_name'] = $value;
        $this->attributes['slug']    = Str::slug($value);
    }

    public function orders() {
        return $this->hasMany(Order::class, 'calculator_id', 'id');
    }

    public function calculatorBangabandhuSurakshaBima() {
        return $this->hasOne(CalculatorBangabandhuSurakshaBima::class);
    }

    public function calculatorPropertyLocation() {
        return $this->hasMany(CalculatorPropertyLocation::class);
    }

    public function calculatorPropertyOrOccupationType() {
        return $this->hasMany(CalculatorPropertyOrOccupationType::class);
    }

    public function calculatorMemberAssociation() {
        return $this->hasMany(CalculatorMemberAssociation::class);
    }

    public function calculatorBuildingConstruction() {
        return $this->hasMany(CalculatorBuildingConstruction::class);
    }

    public function calculatorInterestType() {
        return $this->hasMany(CalculatorInterestType::class);
    }

    public function calculatorAdditionalCoverage() {
        return $this->hasMany(CalculatorAdditionalCoverage::class);
    }

    public function calculatorBuildingConstructionRoof() {
        return $this->hasOne(CalculatorBuildingConstructionRoof::class);
    }

    public function calculatorCargoProduct() {
        return $this->hasMany(CalculatorCargoProduct::class);
    }

    public function calculatorTariffType() {
        return $this->hasMany(CalculatorTariffType::class);
    }

    public function calculatorCarriedBy() {
        return $this->hasMany(CalculatorCarriedBy::class);
    }

    public function calculatorCountryVisit() {
        return $this->hasMany(CalculatorCountryVisit::class);
    }

    public function calculatorInsuranceSubType() {
        return $this->hasMany(CalculatorInsuranceSubType::class);
    }

    public function calculatorRiskCover() {
        return $this->hasMany(CalculatorRiskCover::class);
    }

    public function calculatorMotorInsurance() {
        return $this->hasMany(CalculatorMotorInsurance::class);
    }

    public function calculatorVehicleCategory() {
        return $this->hasMany(CalculatorVehicleCategory::class)->with('CalculatorEnginCapacity');
    }

    public function calculatorInstitutionType() {
        return $this->hasMany(CalculatorInstitutionType::class);
    }

    public function calculatorPeoplePersonalAccident() {
        return $this->hasMany(CalculatorPeoplePersonalAccident::class);
    }

    public function calculatorStrikeRiotCivilCommotion() {
        return $this->hasMany(CalculatorStrikeRiotCivilCommotion::class);
    }

    public function calculatorInsuranceDistrict() {
        return $this->hasMany(CalculatorInsuranceDistrict::class);
    }
}
