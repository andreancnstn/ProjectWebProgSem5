<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if(Auth::check()) {
        // }
        $pizzas = Pizza::paginate(6);

        if($request->search != null) {
            $pizzas = Pizza::where('pizza_name', $request->search)->paginate(6);
        }
        
        // dd($pizzas, $request);

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
            'price' => 'required|numeric|gt:10000',
            'image' => 'required|file|image'
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
    public function update(Request $request)
    {
        $pizza = Pizza::find($request->id);

        $data = $this->validate($request, [
            'pizza_name' => 'required|max:20',
            'desc' => 'required|min:20',
            'price' => 'required|numeric|gt:10000',
            'image' => 'nullable|file|image'
        ]);
        
        if($request->hasFile('image')) {
            $image_path = $request->image->store('image', 'public');
            Storage::delete('public/'.$pizza->image);
        }
        else {
            $image_path = $pizza->image;
        }
        

        $pizza->update(array_merge(
            $data,
            ['image' => $image_path]
        ));

        return redirect()->route('home_pizza');
    }

    public function delete($id)
    {
        $pizza = Pizza::findOrFail($id);

        return view('pizza.delete', compact('pizza'));
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
        Storage::delete('public/'.$pizza->image);
        $pizza->delete();

        return redirect()->route('home_pizza');
    }

    public function seeImage($url)
    {
        $filePath = public_path($url);
        return response()->download($filePath);
    }
}
