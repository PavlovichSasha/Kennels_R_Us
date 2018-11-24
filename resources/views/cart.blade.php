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
                            <th></th>
                            <th>Price</th>
                            <th>total</th>
                            <th></th>
                        </tr>
                        @foreach ($items->sortBy('id') as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>
                                <form action="{{ route('updateCart') }}" method='post'>
                                    <input type="number" name="qty" min = "0" value='{{$item->quantity}}'>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="itemID" value="{{$item->id}}"> 
                                    <input type="submit" value='update' class='btn btn-link'>
                                </form>
                            </td>
                                
                            <td>{{$item->price}}</td>
                            <td>{{$item->getPriceSum()}}</td>
                            <td> <form action="{{ route('removeFromCart') }}" method='post'>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="itemID" value="{{$item->id}}"> 
                                    <input type='submit' value='remove' class='btn btn-danger btn-sm'>
                                    </form>
                                </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total:</td>
                            <td>{{$total}}</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><form action="{{ route('checkout') }}" method='get'>
                                    <input type="submit" value='Checkout' class="btn btn-success">
                                </form>
                            </td>
                            
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
