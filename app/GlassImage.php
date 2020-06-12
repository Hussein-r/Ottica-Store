<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlassImage extends Model
{
    protected $table = 'glass_images';
    protected $fillable = ['glass_id','image'];
    public function glass()
    {
        return $this->belongsTo('App\Glass');

       

    }
}
