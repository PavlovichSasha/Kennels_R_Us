@extends('layouts.app')

@section('content')
<div>
		
    <div class = "centered">
    <script type="text/javascript">
    function showUser(str) {
        if (str == "") {
            document.getElementById("showtbl").innerHTML = "";
            return;
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("showtbl").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","bingham.php?q="+str,true); //open controller
            xmlhttp.send();
        }
    }
    
    
    </script>
    <div>
        <select name="users" onchange="showUser(this.value)">
            <option value="">Select a table:</option>
            <option value="1">tblcustomer</option>
            <option value="2">tblfeatures</option>
            <option value="3">tblorderdetails</option>
            <option value="4">tblproducts</option>
            <option value="5">tblusers</option>
        </select>
    </form>
    </div>
    <div id="showtbl">
        
    </div>
    </div>
    <form name="bingtime" action="">
      <div>
        <input type="text" name="datefrom" pattern = "[([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))">
      </div>
      <div>
        <input type="text" name="dateto" pattern = "[([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))">
        <Input type="submit">
      </div>
    </form>
@endsection
