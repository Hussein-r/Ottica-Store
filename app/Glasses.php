<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Glasses extends Model
{
    //
    protected $table = 'glasses';
    protected $fillable = ['brand_id', 'color_id', 'secondary_color_id','face_shape_id','frame_shape_id','material_id','secondary_material_id','fit_id','gender','glass_type','label','glass_code','price_before_discount','price_after_discount','best_seller'];
    


}
