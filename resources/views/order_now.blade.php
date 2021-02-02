@extends('auth.master')
@section('title')
    Order Now
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <table class="table table-dark w-25">
                <tbody>
                    <tr>
                        <td>Amount</td>
                        <td>$ {{$total}}</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>$ 0</td>
                    </tr>
                    <tr>
                        <td>Delviery</td>
                        <td>$ {{$ship_price}}</td>
                    </tr>
                    <tr>
                        <td>Delviery</td>
                        <td>$ {{$total+$ship_price}}</td>
                    </tr>
                </tbody>
            </table>
            <p>Shipping information</p>
            <form action="{{route('orderplace')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="address">Your Address: </label>
                    <textarea name="address" class="form-control" id="address" placeholder="Address.."></textarea>
                </div>
                <div class="form-group">
                    <label for="payment_method">Payment Method</label><br>
                    <input type="radio" value="vcash" name="payment_method" id=""><span>Vodafone Cash</span>
                    <input type="radio" value="paypal" name="payment_method" id=""><span>PayPal Payment</span>
                    <input type="radio" value="payon" name="payment_method" id=""><span>Cash on Delivery </span>
                </div>
                <input type="submit" class="btn btn-default" value="Order Now">
            </form>
        </div>
    </div>
</div>

@endsection