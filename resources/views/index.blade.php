@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <p>Kennels R Us delivers quality outdoor units for a variety  of household pets. 
                            Out unique brand of kennel is easy to customize so that you can create a safe 
                            place for your pet that will fit your needs. </p>

                        <p>The simplified ordering process ensures that you get your perfect kennel fast.
                        Choose standard size options from out Products page, or create a custom outdoor 
                        facility in whatever size you need. </p>
                    </div>

                </div>
            </div>
            <div class = "row justify-content-center">
                <figure>
                <img class = "frontpg-pic" src = "img/owner.jpg" alt = "picture of owners">
                <figcaption class = "centered">Our Owner: Dave Smith</figcaption>
                </figure>

                <figure>
                <img class = "frontpg-pic" style = "width: 300px" src = "img/happy_dog.jpg" alt = "picture of dog">
                <figcaption class = "centered">His Beautiful Dog: Rosco</figcaption>
                </figure>
            </div>
        </div>
    </div>
</div>
@endsection
