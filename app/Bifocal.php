<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bifocal extends Model
{
    //
    protected $table = 'bifocal_lenses';
    public function color()
    {
        return $this->belongsTo('App\Color');
    }
}

