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
    //add Request $request for search and if 
    public function index(Request $request)
    {
        //use if when search is used
        
            $pizza_name = $request->get('pizza_name');

            $pizzas = Pizza::all();

            if($pizza_name != '') {
                $pizzas = $pizzas->where('pizza_name', '=', $pizza_name);
            }

        // dd($pizzas);

        return view('pizza.index', compact('pizzas'));
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
        $pizza = Pizza::findOrFail($id);

        return view('pizza.detail', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::findOrFail($id);

        // dd($pizza);

        return view('pizza.edit', compact('pizza'));
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

        return redirect()->route('home_pizza');
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

        return redirect()->route('home_pizza');
    }
}
