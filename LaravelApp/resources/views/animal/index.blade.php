@extends('layouts.app')


@section('content')

<section class="sectionindex">

<div>
  <h2 class="indextitle"> TAKE A LOOK AT OUR ANIMALS</h2>
</div>

<div class="divtable">
<table>
  <thead> 
    <tr> 
      <th> ID </th>
      <th> Name</th>
      <th> Description</th>
      <th> Picture </th>
      <th> Family </th>
    </tr>
  </thead>
  <tbody>
    @forelse($animals as $animal)
    <tr>
      <td > {{ $animal->id }}</td>
      <td >{{ $animal->name_animal }}</td>
      <td >{{ $animal->description }}</td>
      <td > <img width="150px" height="150px" src= "{{ Storage::url($animal->image) }}"> </td>
      <td > {{ $animal-> libelle }} </td>
      <td> 
      <div class="buttonsindex">
      <a class="btnindex" href="{{ route(('dashboard.edit'))}}" > EDIT </a> 
      <form method="POST" action="{{ route('dashboard.delete', $animal->id) }}">
          @method('DELETE')
          @csrf
        <input type="submit" class="btnindex2" value="DELETE"/>
      </form> 
      </div>
      </td>
    </tr>

    @empty
    <tr>
      No Category Yet
    </tr>
    @endforelse

  </tbody>
</table>
</div>




  <button class="add">
    ADD NEW ANIMAL
  </button>


</section>

@endsection