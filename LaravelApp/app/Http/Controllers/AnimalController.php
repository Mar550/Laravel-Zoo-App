<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Continent;
use App\Models\Family;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $families = Family::all();
        $continents = Continent::all();
        return view('animal.create', compact('families','continents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_animal' => 'required|unique:categories',
            'description' => 'required|string',
            'image' => 'required|max:2048',
        ],[
            'name_animal.required' => 'Animal name is required',
            'name_animal.unique' => 'Animal name is unique',
            'description.required' => 'Description is required',
            'description.unique' => 'Description is unique',
            'description.string' => 'The description must contain characters',
            'image.max' => 'The maximum upload file is 2M',
        ]);

        $path = $request->file('image')->store('public/files');

        Animal::create([
            'name_animal' => $request->name_animal,
            'description' => $request->description,
            'image' => $path,
        ]);
        
        $request->session()->put('message', 'Animal created successfully');
        return redirect()->route('dashboard.index')->with('message','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Family::find($id)->animals;
        $family = Family::find($id);
        return view('show', ['animal'=>$animal,'categorie'=>$family]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {

    }
}
