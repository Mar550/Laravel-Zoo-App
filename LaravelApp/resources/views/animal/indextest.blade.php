@extends('layouts.app')


@section('content')

<div class="classdiv">
  <h2 class="indextitle"> TAKE A LOOK AT OUR ANIMALS</h2>
</div>

<div class="divtable">
  <table id="list">

    <thead>
      <tr>
        <th> ID</th>
        <th> Name </th>
        <th> Description </th>
        <th> Image </th>
        <th> Family </th>
      </tr>
    </thead>

    <tbody id="list">

      <tr id="list">
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td>
          <a> SHOW </a>
          <a> EDIT </a>
          <a> DELETE </a>
        </td>
      </tr>

    </tbody>

  </table>

</div>









</section>

<script>
  $(document).ready(function() {

    function fetchData() {
      $.ajax({
        type: "GET",
        url: "/dashboard/fetchData",
        dataType: "json",
        success: function(response) {
          const {
            data
          } = response
          console.log(response);

          $.each(data, function(key, val) {
            let {
              id,
              name_animal,
              description,
              image,
              family_id
            } = val;
            let content = `
        <tr>
          <td> ${id}} </td>
          <td> ${name_animal}</td>
          <td> ${description}}</td>
          <td> ${image} </td>
          <td> ${libelle} </td>
        </tr>`;
            $('#list').append(content);
          });

          /***
            
           */
        }
      });

    }

    fetchData()

  });
</script>
@endsection