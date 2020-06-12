<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class LenseBrand extends Model
{
    //
 
    protected $fillable = [
        'name',
        'image',
    ];
    public function scopeList($query)
    {
        return $query ;
    }
    
    public function lenses()
    {
        return $this->hasMany('App\ContactLenses');
    }


}
