<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class lense_brands extends Model
{
    //
    use SoftDeletes;
    protected $table = 'lense_brands';
    public function scopeLenseList($query)
    {
        return $query ;
    }

}
