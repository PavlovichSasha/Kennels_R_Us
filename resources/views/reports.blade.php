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
    <br>
    <div>
        <?php
        if(!empty($_GET['q'])){
          $q = ($_GET['q']);
          if(!empty($_POST['q']))
              $q = ($_POST['q']);
        } else {
            $q = 0;
        }
        ?>
        @if ($q == 1)
          <table>
          <tr>
              <th>Customer ID</th>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Email</th>
            </tr>
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
        @if($q == 2)
          <table>
          <tr>
            <th>Feature ID</th>
            <th>Price</th>
            <th>Description</th>
          </tr>
          @foreach ($results as $row)
            <tr>
            <td> {{ $row->FeatureID }} </td>
            <td> {{ $row->Price }} </td>
            <td> {{ $row->Description }} </td>
            </tr>
          @endforeach
          </table>
        @endif
        @if ($q == 3)
          <table>
          <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Order Date</th>
            <th>Total Order Price</th>
          </tr>
          @foreach ($results as $row)
            <tr>
            <td> {{ $row->OrderID }} </td>
            <td> {{ $row->CustomerID }} </td>
            <td> {{ $row->OrderDate }} </td>
            <td> {{ $row->TotalOrderPrice }} </td>
            </tr>
          @endforeach
          </table>
        @endif
        @if ($q == 4) 
          <table>
          <tr>
            <th>Customer ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
          </tr>
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
        @if ($q == 5)
          <table>
          <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Created Date</th>
            <th>Last Date Updated</th>
          </tr>
          @foreach ($results as $row)
            <tr>
            <td> {{ $row->id }} </td>
            <td> {{ $row->name }} </td>
            <td> {{ $row->email }} </td>
            <td> {{ $row-> created_at}} </td>
            <td> {{ $row->updated_at }} </td>
            </tr>
          @endforeach
          </table>
        @endif 
    </div>
    </div>
@endsection
