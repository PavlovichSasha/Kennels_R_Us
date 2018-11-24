@extends('layouts.app')

@section('content')
<?php 

if (Auth::check()) {
    $userId = auth()->user()->id;
    $items = Cart::session($userId)->getContent();
    $total = Cart::session($userId)->getTotal();
}
else{
    $items = Cart::getContent();
    $total = Cart::getTotal(); 
}

?>

<script>

function showShippingDetails() {

     var checkbox = document.getElementById('checkbox');
    var shipping_div = document.getElementById('shippingDetails');

   if(checkbox.checked) {
    shipping_div.style['display'] = 'none';
   } else {
    shipping_div.style['display'] = 'block';
   }
}

</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Checkout</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<form action="{{ route('checkoutComplete') }}" method='post'>
<div class='row'>
        <div class="col-md-4">
            <h3><b>Billing Address</b></h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John Doe"><br>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="apsu@apsu.edu"><br>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="601 College St"><br>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Clarksville"><br>
            <label for="state">State</label>
            <input type="text" id="state" name="state" placeholder="TN"><br>
            <label for="zip">Zip</label>
            <input type="text" id="zip" name="zip" placeholder="37040"><br>
        </div>

          <div class="col-md-4">
            <h3><b>Payment</b></h3>
            <div class="icon-container">
                    <label for="fname"><b>Accepted Cards</b></label>
                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>

                    <label for="cname">Name on Card</label>
                    <input type="text" id="cname" name="cardname" placeholder="John Doe"><br>
                    <label for="ccnum">Credit card number</label>
                    <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"><br>
                    <label for="expmonth">Exp Month</label>
                    <input type="text" id="expmonth" name="expmonth" placeholder="December"><br>
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018"><br>
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="777"><br>
          
                    <label>
                        <input type="checkbox" checked="checked" id='checkbox' onclick='showShippingDetails()'> Shipping address same as billing
                    </label>

        </div>
       



            <div class="col-md-4">
                <div class="container">
                <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> </span></h4>
                @foreach ($items->sortBy('id') as $item)
                <p>{{$item->name}} &nbsp;&nbsp;x{{$item->quantity}} <span class='price' style="float:right;">${{$item->price}}</span></p>

                <input type="hidden" name="qty{{$item->id}}" value='{{$item->quantity}}'>
                 

                @endforeach
                <hr>
                <p>Total <span class="price" style="color:black; float:right;" ><b>${{$total}}</b></span></p>
                <br><input type='submit' value='Place Order' Style='float:right;' class='btn btn-light'>
                </div>
            </div>

            <div class="col-md-4" id="shippingDetails" style='display:none;'>
                        <h3><b>Shipping Address</b></h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="shippingFirstName" placeholder="John Doe"><br>
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="shippingAddress" placeholder="601 College St"><br>
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="shippingCity" placeholder="Clarksville"><br>
                        <label for="state">State</label>
                        <input type="text" id="state" name="shippingState" placeholder="TN"><br>
                        <label for="zip">Zip</label>
                        <input type="text" id="zip" name="shippingZip" placeholder="37040"><br>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
