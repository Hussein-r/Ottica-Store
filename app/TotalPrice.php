<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class TotalPrice extends Model
{
    use SoftDeletes;
    protected $table = 'total_price';
    protected $fillable = ['order_id', 'price', 'price_after_promocode'];
}
