<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactLenses extends Model
{
    //
    protected $table = 'contact_lenses';

    public function lenseProduct()
    {
        return $this->belongsToMany('App\orderList', 'ordered_lenses_prescriptions', 'order_id', 'product_id');
    }
}
