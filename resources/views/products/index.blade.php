@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Our Products</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p><strong>Price: </strong>${{ $product->price }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
