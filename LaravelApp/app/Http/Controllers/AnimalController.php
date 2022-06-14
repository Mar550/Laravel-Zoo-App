<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Continent;
use App\Models\Family;
use Hamcrest\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        ->orderBy('animals.created_at','asc')->paginate(6);

        foreach ($animals as $animal) {
            foreach($animal->continents as $continent){
    
            }
        }
    
        return view('animal.index', compact('animals'));
        //Function 'with' for continents
        //Function 'join' for families    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $animals = Animal::all();
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
        
        $animalsdata = Animal::create([
            'name_animal' => $request->name_animal,
            'description' => $request->description,
            'family_id' => $request->family_id,
            'image' => $path,
        ]);

        $continent = $request->continent_name;

        foreach($continent as $key => $name){
            $insert = [
                'animal_id' => $animalsdata->id,
                'continent_id' => $continent[$key],
            ];
            DB::table('animal_continent')->insert($insert);
        }  
        Session::put('message', 'Animal create successfully');
        return view('animal.index')->with('message','Animal created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);
        return view('animal.edit', compact('show'));   
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
        $families = Family::all();
        $continents = Continent::all();
        return view('animal.edit',['animal'=>$animal],compact('families','continents'));
    }


    public function update(Request $request,$id)
    {
        $animal = Animal::find($id);
        $animal->name_animal = $request->name_animal;
        $animal->description = $request->description;
        $image = $animal->image;
        if($request->file('image')) {
            Storage::delete($image);
            $image = $request->file('image')->store('public/files');
        }
        $animal->image = $image;
        $animal->family_id = $request->family_id;
        
        $continent = $request->continent_name;
        foreach($continent as $key => $name){
            $insert = [
                'animal_id' => $animal->id,
                'continent_id' => $continent[$key],
            ];
            DB::table('animal_continent')->insert($insert);
        }
        
        $animal->update();
        Session::put('update', 'Animal informations updated successfully !');
        return redirect()->route('index');           
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    

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
        return redirect()->route('index');
    }
}
