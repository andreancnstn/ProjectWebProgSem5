<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Pizza;
use ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $carts = Cart::where('user_id', $user_id)->get();
        $pizzas = Pizza::all();

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
    public function store(Request $request, $pizza_id)
    {

        $data = $this->validate($request, [
            'qty' => 'required|gt:0',
        ]);

        auth()->user()->cart()->create(array_merge(
            $data,
            ['user_id' => auth()->user()->id],
            ['pizza_id' => $pizza_id],
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
        $cart = Cart::find($id);

        $data = $this->validate($request, [
            'qty' => 'required',
        ]);

        $cart->update(array_merge(
            $data
        ));

        return redirect()->route('view_cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAllCart($user_id)
    {
        $carts = Cart::where('user_id', '=', $user_id)->get();
        
        foreach($carts as $cart) {
            $cart->delete();
        }

        return redirect()->route('home_pizza');
    }

    public function destroyperid($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('view_cart')->with("success");
    }
}
