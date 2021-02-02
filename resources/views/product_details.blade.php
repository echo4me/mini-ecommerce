@extends('auth.master')
@section('title')
 {{$product->name}}
@endsection
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{$product->gallary}}" alt="" class="img-fluid">
        </div>

        <div class="col-sm-6">
            <a href="{{url('products')}}" class="btn btn-primary">Back</a>
            <h2>{{$product['name']}}</h2>
            <h3>{{$product->price}}$</h3>
            <h4>{{$product->category}}</h4>
            <br>
            
            <form action="{{route('postcart')}}" method="POST" style="display: inline-block; ">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button class="btn btn-warning"> Add To Cart</button>
            </form>
            <button class="btn btn-success"> Buy Now</button>
        </div>
    </div>
</div>

    
@endsection