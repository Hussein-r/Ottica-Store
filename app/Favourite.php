<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class Favourite extends Model
{
    use SoftDeletes;
    protected $table = 'glass_favourites';
    // protected $fillable = ['user_id', 'glass_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function glass()
    {
        return $this->belongsTo('App\Glass');
    }

}
