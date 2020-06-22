<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactLenses extends Model
{
    //
    use SoftDeletes;
    protected $table = 'contact_lenses';
    protected $fillable = [
        'name',
        'label',
        'description',
        'brand_id',
        'type_id',
        'manufacturerer_id',
        'material_of_content',
        'water_of_content',
        'lense_purpose',
        'duration',
        'price',
        'image',
    ];

    public function brand()
    {
        return $this->belongsTo('App\LenseBrand');
    }

    public function color()
    {
        return $this->belongsToMany('App\Color','lense_colors','color_id','lense_id');

    }
    
  

    public function lenseProduct()
    {
        return $this->belongsToMany('App\orderList', 'ordered_lenses_prescriptions', 'order_id', 'product_id');
    }
}
