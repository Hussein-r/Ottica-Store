<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColoredEye extends Model
{
    //
    use SoftDeletes;
    protected $table = 'colored_eyes_images';
}
