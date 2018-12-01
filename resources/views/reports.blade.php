@extends('layouts.app')

@section('content')
<style>


</style>
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
    <div>
    <tr>
        <?php
        if(!empty($_GET['q'])){
          $q = ($_GET['q']);
          if(!empty($_POST['q']))
              $q = ($_POST['q']);
        } else {
            $q = 0;
        }
        ?>
        @if($q == 0)
         <table>
            <tr>
              <th>header1</th>
              <th>header2</th>
              <th>header3</th>
              <th>header4</th>
              <th>header5</th>
            </tr>
            <tr>
              <td>row1</td>
              <td>row2</td>
              <td>row3</td>
              <td>row4</td>
              <td>row5</td>
            </tr>
          </table>
        @endif
        @if ($q == 1)
          <table>
          @foreach ($results as $row)
              <tr>
              <td> {{ $row->CustomerID }} </td>
              <td> {{ $row->LastName }} </td>
              <td> {{ $row->FirstName }} </td>
              <td> {{ $row->Address }} </td>
              <td> {{ $row->Phone }} </td>
              <td> {{ $row->Email }} </td>
              </tr>
          @endforeach
          </table>
        @endif
        @if($q == 2) {
          <table>
          @foreach ($results as $row)
            <tr>";
            <td>" . $row['FeatureID }} </td>
            <td>" . $row['Price }} </td>
            <td>" . $row['Description }} </td>
            </tr>
          @endforeach;
          </table>
        @endif
        @if ($q == 3)
          <table>
          @foreach ($results as $row)
            <tr>
            <td> {{ $row->OrderID }} </td>
            <td> {{ $row->CustomerID }} </td>
            <td> {{ $row->OrderDate }} </td>
            <td> {{ $row->TotalOrderPrice }} </td>
            </tr>
          @endforeach;
          </table>
        @endif
        @if ($q == 4) 
          <table>
          @foreach ($results as $row) : 
            <tr>
            <td> {{ $row->CustomerID }} </td>
            <td> {{ $row->LastName }} </td>
            <td> {{ $row->FirstName }} </td>
            <td> {{ $row->Address }} </td>
            <td> {{ $row->Phone }} </td>
            <td> {{ $row->Email }} </td>
            </tr>
          @endforeach;
          </table>
        @endif
        @if ($q == 5)
          <table>
          @foreach ($results as $row)
            <tr>
            <td> {{ $row->CustomerID }} </td>
            <td> {{ $row->LastName }} </td>
            <td> {{ $row->FirstName }} </td>
            <td> {{ $row->Address }} </td>
            <td> {{ $row->Phone }} </td>
            <td> {{ $row->Email }} </td>
            </tr>
          @endforeach
          </table>
        @endif
    </tr> 
    </div>
    </div>
@endsection
