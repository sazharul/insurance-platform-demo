<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MissionVision extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mission_visions';

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
    protected $fillable = ['en_title', 'bn_title', 'en_breadcrumb_1', 'bn_breadcrumb_1', 'en_breadcrumb_2', 'bn_breadcrumb_2', 'main_image', 'en_details', 'bn_details', 'en_mission_title','bn_mission_title','mission_image', 'en_mission_info_1', 'bn_mission_info_1', 'en_mission_info_2', 'bn_mission_info_2', 'en_vision_title','bn_vision_title','vision_image', 'en_vision_info_1', 'bn_vision_info_1', 'en_vision_info_2', 'bn_vision_info_2'];


}
