<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'invoice_details',
        'insurance_type',
    ];

    public function getInvoiceDetailsAttribute($value)
    {
        return json_decode($value);
    }
}
