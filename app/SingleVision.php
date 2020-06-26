<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SingleVision extends Model
{
    //
    use SoftDeletes;
    protected $table = 'single_vision_lenses';
    public function color()
    {
        return $this->belongsTo('App\Color');
    }
}
