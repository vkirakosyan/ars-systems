<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
    protected $fillable = ['name', 'type'];

    public function getPortfolios()
    {
        return $this->hasMany('App\\Portfolio');
    }

    public function getTeams()
    {
        return $this->hasMany('App\\Team');
    }

    public static function getCategoriesByType($type)
    {
        return self::where('type', $type)->get();
    }
}
