<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerinTeriff extends Model {
    use HasFactory;
    protected $guarded = [];
    public function cargoProduct() {
        return $this->belongsTo(CalculatorCargoProduct::class, 'cargo_product_id', 'id');
    }

    public function member() {
        return $this->belongsTo(CalculatorMemberAssociation::class, 'member_id', 'id');
    }

    public function teriff() {
        return $this->belongsTo(CalculatorTariffType::class, 'teriff_id', 'id');
    }

    public function carriedBy() {
        return $this->belongsTo(CalculatorCarriedBy::class, 'carried_by_id', 'id');
    }

    public function riskCover() {
        return $this->belongsTo(CalculatorRiskCover::class, 'risk_cover_id', 'id');
    }

    public function interestType() {
        return $this->belongsTo(CalculatorMarineInterest::class, 'interest_type_id', 'id');
    }
}
