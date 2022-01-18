@extends('layouts.app')
@section('content')

<section class="sectioncreate">


<div class="divform">


@forelse($animals as $animal)

<form action="{{ route('dashboard.edit') }}" enctype="multipart/form-data">
@csrf
@method('PUT')


  <div class="form-group 1">
    <label for="exampleFormControlInput1"> Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter the animal's name" name="name_animal" value="{{ old('name_animal')}}">
  </div>
    

  @error('name_animal')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span> 
  @enderror


  <div class="form-group 2">
    <label for="exampleFormControlTextarea1"> Description </label>
    <textarea class="form-control2" id="exampleFormControlTextarea1" placeholder="Enter the animal's description" rows="3" name="description" value="{{ old('description') }}"></textarea>
  </div>

  @error('description')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span> 
  @enderror

  <div class="form-group 3">

    <label for="exampleFormControlSelect1">Family</label>
    <select class="form-control" name="family_id" value="{{ old('family_id') }}" >
    @foreach($families as $family)

        <option value="{{$family->id}}" >  {{ $family->libelle }}</option>
        @endforeach

      </select>


  </div>

  


  <div class="form-group 4">
    <label for="exampleFormControlSelect1"> Continent</label>
    <select class="form-control" name="animal_continent" value="{{ old('animal_continent') }}">
        @foreach($continents as $continent)
        <option name="animal_continent" value="{{ $continent->id }}"> {{ $continent->continent_name }} </option>
        @endforeach
    </select>
  </div>
  

  <div class="form-group 5">
    <label for="exampleFormControlFile1"> Picture </label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" value="{{ old('image') }}">
  </div>

  @error('image')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span> 
  @enderror

  <div class="form-group 6">
    <button type="submit" class="submitform"> CREATE </button>
  </div>
  <hr>


</form>

@endforelse

</div>
</section>

@endsection