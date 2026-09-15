<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;
    protected $guarded = [];

    protected $table = "orders";

    public function calculator() {
        return $this->belongsTo(Calculator::class);
    }

    public function invoiceDetails() {
        return $this->hasOne(InvoiceDetails::class, 'order_id', 'id');
    }

    public function sellDetails() {
        return $this->hasOne(CalculatorSellDetail::class);
    }

    public function risk() {
        return $this->belongsTo(CalculatorRiskCover::class, 'risk_coverage_id', 'id');
    }

    public function occupation() {
        return $this->belongsTo(CalculatorPropertyOrOccupationType::class, 'occupation_id', 'id');
    }

    public function insuredPermanentCity() {
        return $this->belongsTo(CalculatorInsuredCity::class, 'insured_permanent_city', 'id');
    }

    public function insuredMailingCity() {
        return $this->belongsTo(CalculatorInsuredCity::class, 'insured_mailing_city', 'id');
    }
}
