@extends('layouts.app')

@section('content')
<div>
    <div>
     <div >
        <label>Filters:</label>
        <a class = "filters" href = "/reports?q=1">Products</a>
        <a class = "filters" href = "/reports?q=2">Features</a>
        <a class = "filters" href = "/reports?q=3">Order</a>
        <a class = "filters" href = "/reports?q=4">Customers</a>
        <a class = "filters" href = "/reports?q=5">Users</a>
        <a class = "filters" href = "/reports?q=6">Features Details</a>
        <a class = "filters" href = "/reports?q=7">Orders Details</a>
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
              <th>Product ID</th>
              <th>Price</th>
              <th>Quantity in stock</th>

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
        @if($q == 2)
          <table>
          <tr>
            <th>Feature ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity In Stock</th>
          </tr>
          @foreach ($results as $row)
            <tr>
            <td> {{ $row->CustomFeatureID }} </td>
            <td> {{ $row->CustomFeatureName }} </td>
            <td> {{ $row->FeatureDescription }} </td>
            <td> {{ $row->QuantityInStock }} </td>
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
            <th>Billing Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Shipping Address</th>
            <th>Service Answer</th>
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
            <td> {{ $row->serviceAnswer }} </td>
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
            <th>Customer ID</th>
          </tr>
          @foreach ($results as $row)
            <tr>
            <td> {{ $row->id }} </td>
            <td> {{ $row->name }} </td>
            <td> {{ $row->email }} </td>
            <td> {{ $row-> created_at}} </td>
            <td> {{ $row->updated_at }} </td>
            <td> {{ $row->customerId }} </td>
            </tr>
          @endforeach
          </table>
        @endif 
        @if ($q == 6)
          <table>
          <tr>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Feature 1</th>
            <th>Feature 2</th>
            <th>Feature 3</th>
            <th>Feature 4</th>

          </tr>
          @foreach ($results as $row)
            <tr>
            <td> {{ $row->ProductID }} </td>
            <td> {{ $row->Quantity }} </td>
            <td> {{ $row->Feature1 }} </td>
            <td> {{ $row->Feature2}} </td>
            <td> {{ $row->Feature3}} </td>
            <td> {{ $row->Feature4}} </td>
            </tr>
          @endforeach
          </table>
        @endif 
        @if ($q == 7)
          <table>
          <tr>
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Feature 1</th>
            <th>Feature 2</th>
            <th>Feature 3</th>
            <th>Feature 4</th>

          </tr>
          @foreach ($results as $row)
            <tr>
            <td> {{ $row->orderID }} </td>
            <td> {{ $row->productID }} </td>
            <td> {{ $row->Quantity }} </td>
            <td> {{ $row->Feature1 }} </td>
            <td> {{ $row->Feature2}} </td>
            <td> {{ $row->Feature3}} </td>
            <td> {{ $row->Feature4}} </td>
            </tr>
          @endforeach
          </table>
        @endif 

    </div>
    </div>
@endsection
