@extends('layouts.app')


@section('content')

<section class="sectionindex">

<div class="divtable">
<table>
  <thead> 
    <tr> 
      <th> Id </th>
      <th> Name</th>
      <th> Description</th>
      <th> Image </th>
      <th> Family </th>
      <th> Continent </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-column="First Name">James</td>
      <td data-column="Last Name">Matman</td>
      <td data-column="Job Title">Chief Sandwich Eater</td>
      <td data-column="Twitter">@james</td>
      <td data-column="Twitter">@james</td>
      <td data-column="Twitter">@james</td>

    </tr>
    <tr>
      <td data-column="First Name">Andor</td>
      <td data-column="Last Name">Nagy</td>
      <td data-column="Job Title">Designer</td>
      <td data-column="Twitter">@andornagy</td>
      <td data-column="Twitter">@james</td>
      <td data-column="Twitter">@james</td>

    </tr>
    <tr>
      <td data-column="First Name">Tamas</td>
      <td data-column="Last Name">Biro</td>
      <td data-column="Job Title">Game Tester</td>
      <td data-column="Twitter">@tamas</td>
      <td data-column="Twitter">@james</td>
      <td data-column="Twitter">@james</td>
    </tr>
  </tbody>
</table>
</div>

<div class="new">
  <h3 class="create"> Add a new animal </h3>
  <button class="add">
    +
  </button>
</div>

</section>

@endsection