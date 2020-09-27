<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Pizza;
use ArrayObject;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $carts = Cart::all();
        $carts = $carts->where('user_id', '=', $user_id);

        $pizzas = new ArrayObject();

        foreach($carts as $value) {
            $x = Pizza::where('pizza_name', '=', $value->pizza_name);
            $pizzas->append($x);
        }

        return view('cart.view', compact('carts', 'pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //send request use javascript via string param
        //can be change through the course - basic dumb design
        $user_id = auth()->user()->id;
        $pizza_name = $request->get('pizza_name');
        $price = $request->get('price');
        $qty = $request->get('qty');
        $image = $request->get('image');

        Cart::create(array_merge(
            ['user_id' => $user_id],
            ['pizza_name' => $pizza_name],
            ['pizza_price' => $price],
            ['qty' => $qty],
            ['image' => $image],
        ));

        return redirect()->route('home_pizza');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
