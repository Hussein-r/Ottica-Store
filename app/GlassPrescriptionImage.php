<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class GlassPrescriptionImage extends Model
{
    //
    use SoftDeletes;
    protected $table = 'ordered_glasses_prescriptions_images';

}
