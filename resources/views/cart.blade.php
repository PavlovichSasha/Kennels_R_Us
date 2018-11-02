@extends('layouts.app')

@section('content')
<?php 

$userId = auth()->user()->id;
$items = Cart::session($userId)->getContent();
$total = Cart::session($userId)->getTotal();


?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cart</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="cart"class="table table-hover text-center">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th> 
                            <th>Price</th>
                            <th>total</th>
                            <th>-</th>
                        </tr>
                        @foreach ($items->sortBy('id') as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td><input type="number" name="qty" min = "0" value='{{$item->quantity}}'></td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->getPriceSum()}}</td>
                            <td><a href=#>Remove</td>

                        </tr>
                        @endforeach

                        <tr>
                        <td></td>
                        <td></td>
                        <td>Total:</td>
                        <td>{{$total}}</td>
                        <td></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
