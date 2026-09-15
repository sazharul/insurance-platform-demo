<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorFlatTeriff extends Model {
    use HasFactory;
    protected $guarded = [];
    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function district() {
        return $this->belongsTo(CalculatorInsuranceDistrict::class, 'district_id', 'id');
    }

    public function location() {
        return $this->belongsTo(CalculatorPropertyLocation::class, 'location_id', 'id');
    }

    public function riskCoverage() {
        return $this->belongsTo(CalculatorRiskCover::class);
    }
}
