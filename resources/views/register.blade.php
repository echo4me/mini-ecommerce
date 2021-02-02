@extends('auth.master')
@section('title')
    Login Page
@endsection
@section('content')
    <div class="container">
        <div class="form">
            <h1 class="text-center text-white">Register page</h1>
            <form action="{{route('post_register')}}" method="POST" class="text-white ">
                @csrf
                
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-default btn-block">Register</button>
                </div>
                <div class="text-center">
                    <a class="btn btn-success" href="{{url('login')}}">Login Page</a>
                </div>
            </form>
        </div>
    </div>
@endsection