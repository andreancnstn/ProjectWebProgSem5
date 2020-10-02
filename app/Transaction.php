<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // protected $fillable = [
    //     'user_id', 'pizza_name', 'price', 'qty', 'total_price', 'image'
    // ];

    protected $fillable = [
        'user_id', 'pizza_id', 'qty', 'total_price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
