<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_types';

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
    protected $fillable = ['name', 'service'];

    public function getService()
    {
        return $this->belongsTo('App\\Service','service');
    }

    public static function getServiceCats()
    {
        return self::select('title')->get();
    } 
}
