<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class GlassImage extends Model
{
    use SoftDeletes;
    protected $table = 'glass_images';
    protected $fillable = ['glass_id','image'];
    public function glass()
    {
        return $this->belongsTo('App\Glass');

       

    }
}
