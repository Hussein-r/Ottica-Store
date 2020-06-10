<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $guarded = [];  
    public function lense()
    {
        return $this->hasMany('App\ContactLenses');
    }

    public function color()
    {
        return $this->hasMany('App\ColorLense','color_id');
    }
    public function glass()
    {
        return $this->hasMany('App\Glass');
    }
}
