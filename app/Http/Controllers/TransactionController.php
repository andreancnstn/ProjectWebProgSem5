<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $transacs = Transaction::where('user_id', $user_id)->get();

        return view('transaction.history', compact('transacs'));
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
    public function store(Request $request, $user_id)
    {
        $carts = Cart::where('user_id', $user_id);

        foreach($carts as $cart) {
            $total_price = $cart->qty * $cart->price;
            Transaction::create(array_merge(
                ['user_id' => $user_id],
                ['pizza_name' => $cart->pizza_name],
                ['price' => $cart->price],
                ['qty' => $cart->qty],
                ['total_price' => $total_price],
                ['image' => $cart->image],
            ));
        }

        $carts->delete();

        return redirect()->route('home_pizza');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($time)
    {
        $transacs = Transaction::where('created_at', $time)->get();

        // dd($transacs);

        return view('transaction.detail', compact('transacs'));
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
        //
    }
}
