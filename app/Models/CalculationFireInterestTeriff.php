<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculationFireInterestTeriff extends Model {
    use HasFactory;
    protected $guarded = [];
    public function location() {
        return $this->belongsTo(CalculatorPropertyLocation::class, 'location_id', 'id');
    }
    public function propertyType() {
        return $this->belongsTo(CalculatorPropertyOrOccupationType::class, 'occupation_id', 'id');
    }

    public function memberAssociation() {
        return $this->belongsTo(CalculatorMemberAssociation::class, 'member_association_id', 'id');
    }

    public function construction() {
        return $this->belongsTo(CalculatorBuildingConstruction::class, 'building_construction_id', 'id');
    }

    public function interest() {
        return $this->belongsTo(CalculatorInterestType::class, 'interest_id', 'id');
    }
}
