@extends('layouts.app')

@section('content')
<script>
var checkboxes = document.querySelectorAll('input[type="checkbox"]');
var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);

</script>




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

                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                    </div>
                    @endif

                 <form action="{{ route('customAddCart') }}" method='post'>
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
                        <legend>Select Additional Features</legend>

                        <div>
                            <input type="checkbox" id="bowls" name="feature1"
                                value="bowls" />
                            <label for="bowls">Food and Water bowls</label>
                        </div>

                        <div>
                            <input type="checkbox" id="roof" name="feature2"
                                value="roof" />
                            <label for="roof">Upgraded Roof</label>
                        </div>

                        <div>
                            <input type="checkbox" id="lock" name="feature3"
                                value="lock" />
                            <label for="lock">Improved Lock</label>
                        </div>

                        <div>
                            <input type="checkbox" id="floor" name="feature4"
                                value="floor" />
                            <label for="floor">Heated Floor</label>
                        </div>

                    </fieldset>
                    <input type='submit' value='Add to Cart'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

                </div> 
            </div>
        
        </div>
  </div>
</div>
@endsection
