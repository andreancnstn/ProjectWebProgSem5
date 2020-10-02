<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // protected $fillable = [
    //     'user_id', 'pizza_name', 'price', 'qty', 'image'
    // ];

    protected $fillable = [
        'user_id', 'pizza_id', 'qty'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function pizzas()
    {
        return $this->hasMany(Pizza::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
