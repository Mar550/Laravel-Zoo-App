@extends('layouts.nav')

@section('contenu')

<section class="sectioncontainers">

<div class="container4">

<div id="carouselExampleCaptions2" class="carousel slide" data-bs-ride="carousel">
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/puma.png" width="400px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/puma.png" width="400px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container3">
<br>
<h3 class="createtitle"> <i class="fa-solid fa-table-list"></i>
 ADD NEW ANIMAL </h3> 
<br>
<br>
<br>
<form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
@csrf
<div class="input-group mb-3">
  <label for="exampleFormControlTextarea1"> Name</label>
  <input type="text" placeholder="Enter the name..." class="form-control" name="name_animal" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

@error('name_animal')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span> 
@enderror

<div class="form-group">
    <label for="exampleFormControlTextarea1"> Description</label>
    <textarea class="form-control" placeholder="Enter the description..." id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
</div>

@error('description')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span> 
@enderror

<div >
<label for="exampleFormControlTextarea1"> Family</label>
<select class="form-select" aria-label="Default select example" name="family_id">
  <option selected> Select the  family </option>
  @foreach($families as $family)  
  <option value="{{$family->id}}"> {{ $family->libelle }}</option>
  @endforeach
</select>
</div>
<br> 

<div class="input-group">
<div>
<label for="exampleFormControlTextarea1"> Continents</label>
</div>
    @foreach($continents as $continent)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="continent_name[]" value="{{ $continent->id }}">
        <label class="form-check-label" for="inlineCheckbox1"> {{ $continent->continent_name }}</label>
      </div>
    @endforeach
</div>
<br>

  <div class="input-group">
    <label for="exampleFormControlTextarea1"> Picture</label>
    <input type="file" name="image" class="form-control" id="inputGroupFile04"       aria-describedby="inputGroupFileAddon04" aria-label="Upload">
  </div>
<br>
  <div class="mb-3">
    <button class="btn btn-primary" id="buttoncreate" type="submit" > CREATE  </button>
  </div>

</form>

</div>
</section>

@endsection

