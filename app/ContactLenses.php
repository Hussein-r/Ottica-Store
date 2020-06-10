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
        'quantity',
        'label',
        'price_before_discount',
        'price_after_discount',
        'description',
        'brand_id',
        'type_id',
        'manufacturerer_id',
        'material_of_content',
        'water_of_content',
        'lense_purpose'];
    
    public function images()
    {
        return $this->hasMany('App\LenseImage','lense_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\LenseBrand');
    }

    public function color()
    {
        return $this->hasMany('App\ColorLense','lense_id');
    }
    
}
