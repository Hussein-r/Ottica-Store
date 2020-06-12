<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;
    protected $guarded = [];  
    public function lense()
    {
        return $this->belongsToMany('App\ContactLenses','lense_colors','color_id','lense_id');

    }

    
    public function glass()
    {
        return $this->hasMany('App\Glass');
    }
}
