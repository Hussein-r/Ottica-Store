<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LenseUseType extends Model
{
    
    protected $table = 'lenses_use_types';
    protected $fillable = ['lense_id', 'duration', 'price'];

}
