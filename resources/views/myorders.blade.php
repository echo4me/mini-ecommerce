@extends('auth.master')
@section('title')
    my Orders
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover table-border text-white">
                <thead class="bg-dark">
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Address</th>
                    <th>price</th>
                    <th>image</th>

                    <th>Payment Status</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->price}}</td>
                            <td> <img width="100" src="{{$order->gallary}}" alt=""> </td>
                            <td class="text-warning">{{$order->payment_status}}</td>
                            <td class="text-warning">{{$order->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection