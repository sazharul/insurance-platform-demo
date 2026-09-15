<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

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
    protected $fillable = ['en_name', 'bn_name', 'url', 'parent_id', 'position', 'left_right'];

    public function subLeftMenu()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id')->where('left_right', 'left')->orderBy('position', 'asc');
    }
    public function subRightMenu()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id')->where('left_right', 'right')->orderBy('position', 'asc');
    }

    public function subMenu()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id')->orderBy('position', 'asc');
    }

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'parent_id');
    }
}
