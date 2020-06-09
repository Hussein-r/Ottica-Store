<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lense_brands extends Model
{
    //
    protected $table = 'lense_brands';
    public function scopeLenseList($query)
    {
        return $query ;
    }

}
