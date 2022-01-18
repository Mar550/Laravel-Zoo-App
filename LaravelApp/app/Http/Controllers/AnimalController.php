<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Continent;
use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $animals = Animal::join('families', 'animals.family_id','=','families.id')
        ->select('animals.id','animals.name_animal','animals.description','animals.image','families.libelle')
        ->orderBy('animals.created_at','desc')->get();

        return view('animal.index', compact('animals'));
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
            'name_animal' => 'required|unique:animals',
            'description' => 'required|string:animals',
            'image' => 'required|max:2048',
        ],[
            'name_animal.required' => 'Animal name is required',
            'name_animal.unique' => 'Animal name is unique',
            'description.required' => 'Description is required',
            'description.string' => 'The description must contain characters',
            'image.max' => 'The maximum upload file is 2M',
        ]);

        $path = $request->file('image')->store('public/files');


        Animal::create([
            'name_animal' => $request->name_animal,
            'description' => $request->description,
            'family_id' => $request->family_id,
            'image' => $path,

        ]);
        Session::put('message', 'Animal create successfully');
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
    public function edit($id)
    {
        $animal = Animal::find($id);
        $animalWithfamily= $animal->family_id;
        return view('dashboard.edit', compact('animalWithfamily','animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $animal = Animal::find($id);
        $image = $animal->image;

        if($request->file('image')) {
            Storage::delete($image);
            $image = $request->file('image')->store('public/files');
        }

        $animal->animal_name = $request->animal_name;
        $animal->description = $request->description;
        $animal->image = $image;

        $animal->save();
        Session::put('update', 'Animal informations updated successfully !');
        return redirect()->route('dashboard.index');           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        if ($animal != null) {
            $animal->delete();
        }
        return redirect()->route('dashboard.index');
    }
}
