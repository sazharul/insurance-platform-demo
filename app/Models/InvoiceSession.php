<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'calculator_id',
        'email',
        'phone',
        'calculator_name',
        'data',
        'data1',
        'data2',
        'calculationType',
        'payment_status',
        'status',
    ];
}
