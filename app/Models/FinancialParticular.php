<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialParticular extends Model
{
    use HasFactory;

    protected $fillable = [
        'en_particulars',
        'bn_particulars',
        'position'
    ];

}
