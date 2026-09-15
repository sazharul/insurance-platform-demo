<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorCountryVisit extends Model {
    use HasFactory;
    protected $guarded = [];
    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function calculatorCountry() {
        return $this->belongsTo(CalculatorInsuranceSubType::class, 'Insurance_sub_type_id', 'id');
    }
    public function country() {
        return $this->belongsTo(CalculatorCountry::class, 'country_id', 'id');
    }

    public function getCountryTypeNameAttribute() {

        if ($this->country_type_id == 1) {
            return 'Excluding USA and CANADA (NONSCHENGEN)';
        } elseif ($this->country_type_id == 2) {
            return 'Excluding USA and CANADA (SCHENGEN)';
        } elseif ($this->country_type_id == 3) {
            return 'INCLUDING USA and CANADA (NONSCHENGEN)';
        } elseif ($this->country_type_id == 4) {
            return 'INCLUDING USA and CANADA (SCHENGEN)';
        }

    }

}
