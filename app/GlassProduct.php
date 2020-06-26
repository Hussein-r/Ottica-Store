<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class GlassProduct extends Model
{
    //
    use SoftDeletes;
    protected $table = 'order_glasses_products';

}
