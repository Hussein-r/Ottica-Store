<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaceShape extends Model
{
    use SoftDeletes;

    protected $table = 'face_shapes';

}
