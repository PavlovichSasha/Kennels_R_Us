@extends('layouts.app')

@section('content')
<div>
    <div>
     <div >
        <label>Filters:</label>
        <a class = "filters" href = "/reports?q=1">Customers</a>
        <a class = "filters" href = "/reports?q=2">Features</a>
        <a class = "filters" href = "/reports?q=3">Order Details</a>
        <a class = "filters" href = "/reports?q=4">Products</a>
        <a class = "filters" href = "/reports?q=5">Users</a>
    </div>
    <div>
    <tr>
        @foreach($data as $d)
          <td>$d</td>
        @endforeach
    </tr> 
    </div>
    </div>
    <form name="date" method="post">
      <div>
      <label>Start Date: </label>
        <input type = "date" name = "start_date" id = "start_date">
      </div>
      <div>
      <label>End Date: </label>
        <input type = "date" name = "end_date" id = "end_date">  
      </div>
      <input type="submit">
    </form>
@endsection
