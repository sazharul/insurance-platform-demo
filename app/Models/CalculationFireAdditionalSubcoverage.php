<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculationFireAdditionalSubcoverage extends Model {
    use HasFactory;
    protected $guarded = [];
    public function additionalCoverage() {
        return $this->belongsTo(CalculatorAdditionalCoverage::class, 'additional_coverage_id', 'id');
    }
}
