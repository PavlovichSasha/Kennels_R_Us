@extends('layouts.app')

@section('content')
<div>
    <div>
     <div >
        <label>Filters:</label>
        <a class = "filters" href = "/public/reports?q=1">Customers</a>
        <a class = "filters" href = "/public/reports?q=2">Features</a>
        <a class = "filters" href = "/public/reports?q=3">Orders</a>
        <a class = "filters" href = "/public/reports?q=4">Products</a>
        <a class = "filters" href = "/public/reports?q=5">Users</a>
    </div>
    
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
        {{-- tblcustomer --}}
        @if ($q == 1)
          <table>
          <tr>
              <th>Customer ID</th>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Billing Address</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Shipping Address</th>
            </tr>
          @foreach ($results as $row)
              <tr>
                <td> {{ $row->CustomerID }} </td>
                <td> {{ $row->LastName }} </td>
                <td> {{ $row->FirstName }} </td>
                <td> {{ $row->billingAddress }} </td>
                <td> {{ $row->Phone }} </td>
                <td> {{ $row->Email }} </td>
                <td> {{ $row->ShippingAddress }} </td>
              </tr>
          @endforeach
          </table>
        @endif
        {{-- tblfeatures --}}
        @if($q == 2)
          <table>
          <tr>
            <th>Feature ID</th>
            <th>Feature Name</th>
            <th>Description</th>
            <th>Units In Stock</th>
          </tr>
          @foreach ($results as $row)
            <tr>
              <td> {{ $row->CustomFeatureID }} </td>
              <td> {{ $row->CustomFeatureName }} </td>
              <td> {{ $row->FeatureDescription }} </td>
              <td> {{ $row->QuantityInStock  }} </td>
            </tr>
          @endforeach
          </table>
        @endif
        {{--tblorder--}}
        @if ($q == 3)
          <table>
          <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Order Date</th>
            <th>Total Orders Price</th>
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
        {{--tblproducts--}}
        @if ($q == 4) 
          <table>
          <tr>
            <th>Product ID</th>
            <th>Price</th>
            <th>Units In Stock</th>
          </tr>
          @foreach ($results as $row)
            <tr>
              <td> {{ $row->ProductID }} </td>
              <td> {{ $row->Price }} </td>
              <td> {{ $row->QuantityInStock }} </td>
            </tr>
          @endforeach
          </table>
        @endif
        {{--users--}}
        @if ($q == 5)
          <table>
          <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Created Date</th>
          </tr>
          @foreach ($results as $row)
            <tr>
              <td> {{ $row->id }} </td>
              <td> {{ $row->name }} </td>
              <td> {{ $row->email }} </td>
              <td> {{ $row->admin}} </td>
              <td> {{ $row->created_at }} </td>
            </tr>
          @endforeach
          </table>
        @endif 
    </div>
    </div>
@endsection
