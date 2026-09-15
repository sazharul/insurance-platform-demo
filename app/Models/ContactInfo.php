<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;
    protected $fillable = ['en_company_name','bn_company_name','email','en_about','bn_about','en_address','bn_address','en_phone_one','bn_phone_one','en_phone_two','bn_phone_two','en_hotline','bn_hotline','logo','favicon','play_small_icon','i_small_icon','play_link','i_link','facebook','twitter','linkedin','youtube','instagram','pinterest'];
}
