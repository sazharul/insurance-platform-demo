<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalFormList extends Model
{
    use HasFactory;

    protected $fillable = ['en_title', 'bn_title', 'pdf_file'];
}
