<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PassengerPrice extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'passenger_prices';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['passenger_price', 'self_driver_price', 'paid_driver_price', 'tacometer', 'vts_meter'];

}
