<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class LenseProductPrescriptions extends Model
{
    //
    use SoftDeletes;
    protected $table = 'ordered_lenses_prescriptions';
    
   

}
