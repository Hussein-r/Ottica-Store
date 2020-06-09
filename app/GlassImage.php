<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlassImage extends Model
{
    protected $table = 'glass_images';

    public function glass()
    {
        return $this->belongsTo('App\Glass');
    }
}
