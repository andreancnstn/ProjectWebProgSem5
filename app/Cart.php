<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'pizza_name', 'price', 'qty', 'image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function pizza()
    {
        return $this->hasMany(Pizza::class);
    }
}
