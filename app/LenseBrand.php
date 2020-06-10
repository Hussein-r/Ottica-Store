<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LenseBrand extends Model
{
    //
    use SoftDeletes;
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
