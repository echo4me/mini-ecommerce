@php
    use App\Http\Controllers\ProductController;
    $total = 0;
    if(request()->session()->has('user'))
    {
        $total = ProductController::cartItem();
    }
    $user = !empty(auth()->user()->name) ? auth()->user()->name : 'Guest';
    
  
@endphp
<div class="container">
    <nav class="nav bg-light">
        <a class="nav-link active" href="{{url('products')}}">Home</a>
        <a class="nav-link" href="{{url('myorders')}}">Orders</a>
        <a class="nav-link" href="{{url('cartlist')}}">Cart <span class="text-danger">({{$total}})</span></a>
        <form action="search" method="get">
            <input type="text"   name="query" id="search" placeholder="search">
            <input type="submit" class="btn btn-light" value="Search">
        </form>
        

         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$user}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if (Session::has('user'))
              <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
            @else
              <a class="dropdown-item" href="{{route('login')}}">Login</a>
            @endif
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('myorders')}}">My Orders</a>
            </div>
          </li>
    </nav>
</div>