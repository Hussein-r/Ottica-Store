<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlassProductPrescriptions extends Model
{
    //
    protected $table = 'ordered_glasses_prescriptions';
    
    protected $fillable = ['product_id','right_sphere','left_sphere','right_cylinder','left_cylinder','right_axis','left_axis','right_add','left_add'];

}
