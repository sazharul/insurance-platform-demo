<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorAdditionalCoverage extends Model {
    use HasFactory;
    protected $guarded = [];
    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function fireCoverageList() {
        return $this->hasMany(CalculationFireAdditionalSubcoverage::class, 'additional_coverage_id', 'id');
    }

    public function fireCoverageDistrictList() {
        return $this->hasMany(CalculationFireAdditionalCoverage::class, 'additional_coverage_id', 'id');
    }
}
