<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class LensePrescriptionImage extends Model
{
    //
    use SoftDeletes;
    protected $table = 'ordered_lenses_prescriptions_images';

}
