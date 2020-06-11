<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColorLense extends Model
{
    //
    use SoftDeletes;
    protected $table = 'lense_colors';
}
