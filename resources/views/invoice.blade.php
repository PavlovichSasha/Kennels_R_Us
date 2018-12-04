@extends('layouts.app')

@section('content')
<?php 

$address = ($_POST['address']);
$state = ($_POST['state']);
$city = ($_POST['city']);
$zip = ($_POST['zip']);

//converting to lowercase if not already
$address = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($address))));
$state = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($state))));
$city = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($city))));



if (Auth::check()) {
    $userId = auth()->user()->id;
    $items = Cart::session($userId)->getContent();
    $total = Cart::session($userId)->getTotal();

    Cart::session($userId)->clear();
}
else{
    $items = Cart::getContent();
    $total = Cart::getTotal(); 


    Cart::clear();
}

?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Puchase Completed</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                            <h1><b>Invoice</b></h1>
                   <b>Order Date:</b> {{date("M, d, Y h:i:s A")}} CST

                    </p>
                    <table id="cart"class="table table-hover text-center">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th> 
                            <th>Price</th>
                            <th></th>
                        </tr>
                        @foreach ($items->sortBy('id') as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td> {{$item->quantity}} </td>
                            <td>{{$item->getPriceSum()}}</td>
                            <td> </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total:</td>
                            <td><b>{{$total}}</b></td>
                        </tr>
                    </table>


                <p>Shipping Address: <br>
                {{$address}} <br>
                {{$city}} <br>
                {{$state}} {{$zip}} <br>
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
