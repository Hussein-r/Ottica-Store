<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    //
    use SoftDeletes;
    protected $table = 'brands';

    public function scopeGlassList($query)
    {
        return $query ;
   
    }
    public function images()
    {
        return $this->hasMany('App\GlassImage');
    }

    public function glasses()
    {
        return $this->hasMany('App\Glass');
    }

}
