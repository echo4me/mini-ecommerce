@extends('auth.master')
@section('title')
    Searched Results
@endsection
@section('content')

<div class="container">
    <div class="row">
        @foreach ($data as $d)
        <div class="col-sm-4">
            <a href="products/details/{{$d->id}}">
                <div style="position: relative">
                    <img style="width:300px;height:300px" src="{{$d->gallary}}" class="img-fluid">
                    <div style="position: absolute;bottom:30px;left:145px;z-index:100">
                        <span>{{$d->price}}</span>
                        <h3>{{$d->name}}</h3>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection