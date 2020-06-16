<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgressiveVision extends Model
{
    //
    protected $table = 'progressive_vision_lenses';
    public function color()
    {
        return $this->belongsTo('App\Color');
    }
}
