@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        
        <div class="col-4">
            <div class="card">
            <img class="product-pic" src='img/kennel-1.jpg' alt="Small Kennel card">
                <div class="card-body">
                    <h5 class="card-title">Small Kennel</h5>
                    <p class="card-text">suitable for very small dogs and cats.</p>
                    <form action="{{ route('addToCart') }}" method='post'>
                        Quantity:
                        <input type="number" name="qty" min = "0">
                        <input type="hidden" name="id" value=1>
                        <input type="hidden" name="name" value="Small Kennel">
                        <input type="hidden" name="price" value="49.99">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
        <div class='col-1'>
        <!-- spacing -->
        </div>
        <div class="col-4">
            <div class="card">
            <img class="product-pic" src='img/kennel-2.jpg' alt="Standard Kennel card">
                <div class="card-body">
                    <h5 class="card-title">Standard Kennel</h5>
                    <p class="card-text">suitable for pets of the medium variety</p>
                    <form action="{{ route('addToCart') }}" method='post'>
                        Quantity:
                        <input type="number" name="qty" min = "0">
                        <input type="hidden" name="id" value=2>
                        <input type="hidden" name="name" value="Standard Kennel">
                        <input type="hidden" name="price" value="59.99">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
  </div>

  <div class="row justify-content-center">
        
        
        <div class="col-4">
            <div class="card">
            <img class="product-pic" src='img/kennel-3.jpg' alt="Large Kennel card">
                <div class="card-body">
                    <h5 class="card-title">Large Kennel</h5>
                    <p class="card-text">suitable for the largest pets.</p>
                    <form action="{{ route('addToCart') }}" method='post'>
                        Quantity:
                        <input type="number" name="qty" min = "0">
                        <input type="hidden" name="id" value=3>
                        <input type="hidden" name="name" value="Large Kennel">
                        <input type="hidden" name="price" value="69.99">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit">
                    </form>  
                </div>
            </div>
        </div>
        <div class='col-1'>
        <!-- spacing -->
        </div>
        <div class="col-4">
            <div class="card">
            <img class="product-pic" src='img/kennel-custom.jpg' alt="Medium Kennel card">
                <div class="card-body">
                    <h5 class="card-title">Custom Kennel</h5>
                    <p class="card-text">designed by you to support all your pets needs</p>
                    <button href = "#cart">Click for Customization Options</button>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection
