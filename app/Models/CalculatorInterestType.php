<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorInterestType extends Model {
    use HasFactory;
    protected $guarded = [];
    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function occupation() {
        return $this->belongsTo(CalculatorPropertyOrOccupationType::class, 'occupation_id', 'id');
    }
}
