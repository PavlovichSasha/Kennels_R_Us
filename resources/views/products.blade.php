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
                    <form action="#cart">
                        Quantity:
                        <input type="number" name="sml_quantity" min = "0">
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
                    <form action="#cart">
                        Quantity:
                        <input type="number" name="strd_quantity" min = "0">
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
                    <form action="#cart">
                        Quantity:
                        <input type="number" name="lrg_quantity" min = "0">
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
                    <a href = "/custom"><button style = "color: black">Click for Customization Options</button></a>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection
