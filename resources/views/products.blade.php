@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        
        <div class="col-4">
            <div class="card">
            <img class="card-img-top" src='img/kennel-1.jpg' alt="Medium Kennel card">
                <div class="card-body">
                    <h5 class="card-title">Small Kennel</h5>
                    <p class="card-text">suitable for very small dogs and cats.</p>
                </div>
            </div>
        </div>
        <div class='col-1'>
        <!-- spacing -->
        </div>
        <div class="col-4">
            <div class="card">
            <img class="card-img-top" src='img/kennel-2.jpg' alt="Medium Kennel card">
                <div class="card-body">
                    <h5 class="card-title">Medium Kennel</h5>
                    <p class="card-text">suitable for pets of the medium variety</p>
                </div>
            </div>
        </div>
  </div>

  <div class="row justify-content-center">
        
        
        <div class="col-4">
            <div class="card">
            <img class="card-img-top" src='img/kennel-3.jpg' alt="Medium Kennel card">
                <div class="card-body">
                    <h5 class="card-title">Large Kennel</h5>
                    <p class="card-text">suitable for the largest pets.</p>
                </div>
            </div>
        </div>
        <div class='col-1'>
        <!-- spacing -->
        </div>
        <div class="col-4">
            <div class="card">
            <img class="card-img-top" src='img/kennel-custom.jpg' alt="Medium Kennel card">
                <div class="card-body">
                    <h5 class="card-title">Custom Kennel</h5>
                    <p class="card-text">designed by you to support all your pets needs</p>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection
