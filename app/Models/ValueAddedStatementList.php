<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueAddedStatementList extends Model
{
    use HasFactory;
    protected $fillable = ['en_title', 'bn_title', 'image', 'pdf_file'];
}
