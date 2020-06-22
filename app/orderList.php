<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class orderList extends Model
{
    //
    use SoftDeletes;
    protected $table = 'orders';

    public function scopeList($query)
    {
        return $query ->where('user_order_state','1');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lenses()
    {
        return $this->belongsToMany('App\ContactLenses', 'ordered_lenses_prescriptions', 'order_id', 'product_id');
    }

    // public function glassProducts(){
    //     return $this->hasMany('App\Glass','order_glasses_products','order_id','product_id');
    // }

    // 
}
