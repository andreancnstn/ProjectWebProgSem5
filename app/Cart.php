<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'pizza_name', 'pizza_price', 'qty',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
