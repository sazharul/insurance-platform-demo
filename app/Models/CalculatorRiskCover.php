<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorRiskCover extends Model {
    use HasFactory;
    protected $guarded = [];
    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function calculatorMarineInterestType() {
        return $this->hasMany(CalculatorMarineInterest::class, 'risk_coverage_id', 'id');
    }
}
