@extends('auth.master')
@section('title')
    Login Page
@endsection
@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        
        @endif
        <div class="form">
            <h1 class="text-center text-default">Login page</h1>
            <form action="{{route('post_login')}}" method="POST">
                @csrf
                @error('email')
                    <p class="alert alert-danger">
                        {{$message}}
                    </p>
                @enderror
                @error('pass')
                    <p class="alert alert-danger">
                        {{$message}}
                    </p>
                @enderror
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-default btn-block">Login</button>
                </div>
                <div class="text-center">
                    <a class="btn btn-success" href="{{url('register')}}">Create New Account </a>
                </div>
            </form>
        </div>
    </div>
@endsection