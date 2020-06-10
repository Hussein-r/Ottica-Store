<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class SpecialOffers extends Model
{
    //
    use SoftDeletes;
    public function scopeList($query)
    {
        return $query ;
    }
}
