@extends('auth.master')
@section('title')
    Cart List
@endsection
@section('content')
<div class="container">
    <h3>Items on Cart</h3>
    <a href="/order_now" class="btn btn-success">Order Now</a><br><br>
        
        @foreach ($products as $product)
        <div class="row mb-4">
                <div class="col-sm-3">
                    <a href="products/details/{{$product->id}}">
                        <img class="img-fluid" src="{{$product->gallary}}" alt="">
                    </a>
                    
                </div>
                <div class="col-sm-3">
                    <h3>{{$product->name}}</h3>
                    <h6>{{$product->price}}</h6>
                </div>
                <div class="col-sm-3">
                    <!-- id of id on cart table  -->
                    <a href="/removecart/{{$product->cart_id}}" class="btn btn-warning">Remove item</a>
                </div>
            </div>
            <hr>
        @endforeach
        <a href="/order_now" class="btn btn-success">Order Now</a><br><br>
</div>

@endsection