<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorCountry extends Model {
    use HasFactory;

    protected $guarded = [];

    public function getCountryTypeNameAttribute() {

        if ($this->type == 1) {
            return 'NONSCHENGEN';
        } elseif ($this->type == 2) {
            return 'SCHENGEN';
        }

    }

}
