@extends('auth.master')
@section('title')
    All Products
@endsection
@section('content')

<div class="container">
    <div class="items">
        @foreach ($products as $product)
        <a href="products/details/{{$product->id}}">
            <div style="position: relative">
                <img style="width:300px;height:400px" src="{{$product->gallary}}" class="img-fluid">
                <div style="position: absolute;bottom:30px;left:145px;z-index:100">
                    <h4>{{$product->name}}</h4>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <br>
    <h3>trending now</h3>
    <div class="items">
        @foreach ($products as $product)
        <a href="products/details/{{$product->id}}">
            <div style="position: relative">
                <img style="width:100px;height:100px" src="{{$product->gallary}}" class="img-fluid">
                <div style="position: absolute;bottom:30px;left:145px;z-index:100">
                    <span>{{$product->price}}</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

@endsection