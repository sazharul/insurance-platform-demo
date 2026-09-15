<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorCarriedBy extends Model {
    use HasFactory;
    protected $guarded = [];
    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function calculatorRiskCoverage() {
        return $this->hasMany(CalculatorRiskCover::class, 'carried_by_id', 'id');
    }
}
