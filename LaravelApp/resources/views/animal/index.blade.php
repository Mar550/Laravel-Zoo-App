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
      <th> Continents </th>

    </tr>
  </thead>
  <tbody>
    @forelse($animals as $animal)
    <tr>
      <td > {{ $animal->id }}</td>
      <td >{{ $animal->name_animal }}</td>
      <td >{{ $animal->description }}</td>
      <td > <img width="150px" height="150px" src= "{{ Storage::url($animal->image) }}"> </td>
      <td > {{ $animal->libelle }} </td>
      <td >
      @foreach($animal->continents as $cont)
       <p> {{ $cont->continent_name}} </p>
      @endforeach
      </td>
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


  <div class="adddiv">
  <a href="{{ route(('dashboard.create')) }}">
  <button type="button" value=" ADD NEW ANIMAL"  class="add">
  <i class="fas fa-plus-square"></i>
    ADD NEW ANIMAL
  </button>
  </a>
</div>


</section>
<!--
<script>
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
    }
  });
  
    function deleteRecord(id){
      if(confirm('do you want to delete this item')){
      $.ajax({
        url:"dashboard/aniamls"+id,
        type:'DELETE',
        date:{
          "message" : "No data"
        },

      success:function(response){
        console.log(response);
        $("#pre"+id).remove();
        $("#record").append('<p>'+ success + '</p>');
      }  
    });        
  }
}
</script>
-->
@endsection