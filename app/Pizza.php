<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        'pizza_name', 'price', ' desc', 'pic'
    ];
}
