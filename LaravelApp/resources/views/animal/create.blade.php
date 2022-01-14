@extends('layouts.app')
@section('content')


<div class="title">
        <h1> NEW ANIMAL </h1>
</div>

<form method="POST" action="{{ route('dashboard.store') }}" enctype="multipart/form-data">
@csrf

  <div class="form-group">
    <label for="exampleFormControlInput1"> Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter the animal's name">
  </div>

  @error('name_animal')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span> 
  @enderror

  <div class="form-group">
    <label for="exampleFormControlSelect1">Family</label>
    <select class="form-control">
        @foreach($families as $family)
        <option> {{ $family->libelle }} </option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1"> Continent</label>
    <select class="form-control">
        @foreach($continents as $continent)
        <option> {{ $continent->continent_name }} </option>
        @endforeach
    </select>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1"> Description </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Enter the animal's description" rows="3"></textarea>
  </div>

  @error('description')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span> 
  @enderror

  <div class="form-group">
    <label for="exampleFormControlFile1"> Picture </label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>

  @error('image')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span> 
  @enderror

  <div class="form-group">
    <button type="submit" class="btn btn-primary"> CREATE </button>
  </div>

</form>

@endsection