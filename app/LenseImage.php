<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class LenseImage extends Model
{
    //
    protected $table = 'lense_images';
    
    public function lense()
    {
        return $this->belongsTo('App\ContactLenses');
        
    }
  
}
