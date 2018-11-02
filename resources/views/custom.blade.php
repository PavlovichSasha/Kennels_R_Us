@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                <img class="product-pic" src='img/kennel-custom.jpg' alt="Medium Kennel card">
                    <h5 class="card-title">Custom Kennel</h5>
                    <p class="card-text">designed by you to support all your pets needs</p>
                </div>
                <div class="card-body">
                <form>
                    <fieldset>
                        <legend>Select a kennel size</legend>

                        <div>
                            <input type="radio" id="small"
                                name="size" value="small" checked />
                            <label for="small">Small</label>
                        </div>

                        <div>
                            <input type="radio" id="standard"
                                name="size" value="standard" />
                            <label for="standard">Standard</label>
                        </div>

                        <div>
                            <input type="radio" id="large"
                                name="size" value="large" />
                            <label for="large">Large</label>
                        </div>

                    </fieldset>
                    <fieldset>
                        <legend>Choose some features</legend>

                        <div>
                            <input type="checkbox" id="bowls" name="feature"
                                value="bowls" />
                            <label for="bowls">Food and Water bowls</label>
                        </div>

                        <div>
                            <input type="checkbox" id="roof" name="feature"
                                value="roof" />
                            <label for="roof">Upgraded Roof</label>
                        </div>

                        <div>
                            <input type="checkbox" id="lock" name="feature"
                                value="lock" />
                            <label for="lock">Improved Lock</label>
                        </div>

                        <div>
                            <input type="checkbox" id="floor" name="feature"
                                value="floor" />
                            <label for="floor">Heated Floor</label>
                        </div>

                    </fieldset>
                    <button href = "#cart">Add to cart</button>
                </form>

                </div> 
            </div>
        
        </div>
  </div>
</div>
@endsection
