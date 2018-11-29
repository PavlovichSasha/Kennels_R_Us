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
        <?php
        $q = intval($_GET['q']);        
        //tblcustomer option
        if ($q == 1) {
        echo "<table>";
        foreach ($results as $row) : 
            echo "<tr>";
            echo "<td>" . $row['CustomerID'] . "</td>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "</tr>";
          endforeach;
        echo "</table>";

        }else if($q == 2) {
          echo "<table>";
          foreach ($results as $row) : 
            echo "<tr>";
            echo "<td>" . $row['FeatureID'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td>" . $row['Description'] . "</td>";
            echo "</tr>";
          endforeach;
          
          echo "</table>";	
        }else if ($q == 3) {
          echo "<table>";
          foreach ($results as $row) : 
            echo "<tr>";
            echo "<td>" . $row['OrderID'] . "</td>";
            echo "<td>" . $row['CustomerID'] . "</td>";
            echo "<td>" . $row['OrderDate'] . "</td>";
            echo "<td>" . $row['TotalOrderPrice'] . "</td>";
            echo "</tr>";
          endforeach;
          echo "</table>";

        }else if ($q == 4) {
          echo "<table>";
          foreach ($results as $row) : 
            echo "<tr>";
            echo "<td>" . $row['CustomerID'] . "</td>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "</tr>";
          endforeach;
          echo "</table>";

        }else if ($q == 5) {
          echo "<table>";
          foreach ($results as $row) : 
            echo "<tr>";
            echo "<td>" . $row['CustomerID'] . "</td>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "</tr>";
          endforeach;
          echo "</table>";
          }
        ?>
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
