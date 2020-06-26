<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contact_us extends Model
{
    //
    use SoftDeletes;
    public $table = 'contact_us';
    public $fillable = ['name','email','subject','message'];
}
