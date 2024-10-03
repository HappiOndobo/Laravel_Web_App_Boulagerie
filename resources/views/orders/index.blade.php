@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Orders</h1>
    @foreach($orders as $order)
        <div class="order">
            <h3>Order #{{ $order->id }} - Status: {{ $order->status }}</h3>
            <p>Total Price: ${{ $order->total_price }}</p>
            <ul>
                @foreach($order->orderItems as $item)
                    <li>{{ $item->product->name }} - {{ $item->quantity }} x ${{ $item->price }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection
