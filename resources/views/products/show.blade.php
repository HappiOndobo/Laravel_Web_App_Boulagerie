@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p><strong>Price: </strong>${{ $product->price }}</p>
        <a href="{{ url()->previous() }}">Back to Products</a>
    </div>

    <form action="{{ route('cart.add', $product->id) }}" method="POST">
       @csrf
       <button type="submit" class="btn btn-primary">Add to Cart</button>
    </form>

@endsection
