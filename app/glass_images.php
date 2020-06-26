<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class glass_images extends Model
{
    //
    use SoftDeletes;
    protected $table = 'glass_images';

    // public function orderGlasses(){

    // }

}
