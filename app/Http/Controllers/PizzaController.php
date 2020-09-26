<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::all();

        return view('pizza.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $this->validate($request, [
            'pizza_name' => 'required|max:20',
            'desc' => 'required|min:20',
            'price' => 'required|numeric|min:5',
            'image' => 'required|file|mimes:jpeg,jpg,png'
        ]);

        $image_path = $request->image->store('image', 'public');

        Pizza::create(array_merge(
            $data,
            ['image' => $image_path]
        ));

        return redirect('/home-pizza');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pizza::findOrFail($id);

        return view('pizza.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pizza::findOrFail($id);

        // dd($data);

        return view('pizza.edit', compact('data'));
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
        $pizza = Pizza::find($request->id);

        $data = $this->validate($request, [
            'pizza_name' => 'required|max:20',
            'desc' => 'required|min:20',
            'price' => 'required|numeric|min:5',
            'image' => 'required|file|mimes:jpeg,jpg,png'
        ]);

        $image_path = $request->image->store('image', 'public');

        $pizza->update(array_merge(
            $data,
            ['image' => $image_path]
        ));

        return redirect('/home-pizza');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pizza = Pizza::find($id);
        $pizza->delete();

        return redirect('/home-pizza');
    }
}
