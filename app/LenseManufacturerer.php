<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LenseManufacturerer extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',
    ];
    
}
