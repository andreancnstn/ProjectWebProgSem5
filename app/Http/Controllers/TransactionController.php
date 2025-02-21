<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Pizza;
use App\Transaction;
use App\User;
use ArrayObject;
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
        $pizzas = Pizza::all();
        $data = new ArrayObject();

        for ($i = 0; $i < count($transacs); $i ++) {
            if($i > 0) {
                $timeone = $transacs[$i]->created_at;
                $timetwo = $transacs[$i - 1]->created_at;
                if ($timeone == $timetwo) {
                    continue;
                }
                else{
                    $data->append($transacs[$i]);
                }
            }
            else if($transacs[$i]->id == 1) {
                $data->append($transacs[$i]);
            }
        }

        return view('transaction.history', compact('data', 'pizzas'));
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
            $pizza_price = Pizza::where('id', $cart->pizza_id)->first()->price;
            $total_price = $cart->qty * $pizza_price;
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

        return view('transaction.detail', compact('transacs', 'pizzas'));
    }

    public function showAllTransac()
    {
        $transacs = Transaction::all();
        $users = User::all();
        $data = new ArrayObject();

        for ($i = 0; $i < count($transacs); $i ++) {
            if($i > 0) {
                $timeone = $transacs[$i]->created_at;
                $timetwo = $transacs[$i - 1]->created_at;
                if ($timeone == $timetwo) {
                    continue;
                }
                else{
                    $data->append($transacs[$i]);
                }
            }
            else if($transacs[$i]->id == 1) {
                $data->append($transacs[$i]);
            }
        }

        return view('transaction.viewAll', compact('data','users'));
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
