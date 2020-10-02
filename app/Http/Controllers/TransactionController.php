<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Pizza;
use App\Transaction;
use App\User;
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
        $carts = Cart::where('user_id', $user_id)->get();

        foreach($carts as $cart) {
            $total_price = $cart->qty * $cart->price;
            Transaction::create(array_merge(
                ['user_id' => $user_id],
                ['pizza_id' => $cart->pizza_id],
                ['qty' => $cart->qty],
                ['total_price' => $total_price]
            ));
        }

        return redirect()->route('destroy_all_cart', $user_id)->with('success');
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
        $pizzas = Pizza::all();

        // dd($transacs);

        return view('transaction.detail', compact('transacs', 'pizzas'));
    }

    public function showAllTransac()
    {
        $transacs = Transaction::all();
        $users = User::all();

        return view('transaction.viewAll', compact('transacs', 'users'));
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
