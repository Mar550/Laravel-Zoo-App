
@extends('layouts.app')

@section('content')

<section class="sectionedit">
  <h1> UPDATE ANIMAL INFORMATIONS </h1>

  <form method="POST" action="{{ route('dashboard.update',['id'=>$animal->id]) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="form-group 1">
    <label for="exampleFormControlInput1"> Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter the animal's name" name="name_animal" value="{{$animal['name_animal']}}">
  </div>
  
  @error('name_animal')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span> 
  @enderror

  <div class="form-group 2">
    <label for="exampleFormControlTextarea1"> Description </label>
    <textarea class="form-control2" id="exampleFormControlTextarea1" placeholder="Enter the animal's description"  name="description" value="{{$animal['description']}}" > {{$animal['description']}}</textarea>
  </div>

  @error('description')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span> 
  @enderror

  <div class="form-group 3">
    <label for="exampleFormControlSelect1">Family</label>
    <select class="form-control" name="family_id" value="{{ old('family_id') }}">
      @foreach($families as $family)
        <option value="{{$family->id}}"  >  {{ $family->libelle }}</option>
      @endforeach
    </select>
  </div>


  <div class="form-group 4">
    <label for="vehicle1"> Continents </label>
      @foreach($continents as $continent)
        <label for="continents">{{ $continent->continent_name }} </label>
        <input type="checkbox" id="continents" name="continent_name[]" value="{{ $continent->id }}">
      @endforeach
  </div>

  <div class="form-group 5">
    <label for="exampleFormControlFile1"> Picture </label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" value="{{ old('image') }}" >
  </div>

  @error('image')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span> 
  @enderror
  
  <div class="form-group 6">
    <button type="submit" class="submitform"> CREATE </button>
  </div>
  </form>

</section>

@endsection