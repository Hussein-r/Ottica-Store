<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class LenseProduct extends Model
{
    //
    use SoftDeletes;
    protected $table = 'order_lenses_products';

}


