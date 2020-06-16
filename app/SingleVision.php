<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SingleVision extends Model
{
    //
    protected $table = 'single_vision_lenses';
    public function color()
    {
        return $this->belongsTo('App\Color');
    }
}
