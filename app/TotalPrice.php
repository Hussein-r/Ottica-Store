<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalPrice extends Model
{
    protected $table = 'total_price';
    protected $fillable = ['order_id', 'price', 'price_after_promocode'];
}
