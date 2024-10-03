@extends('layouts.app')

@section('content')
   <div class="container">
       <h1>Your Cart</h1>

       <table class="table">
           <thead>
               <tr>
                   <th>Product</th>
                   <th>Price</th>
                   <th>Quantity</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
               @foreach($cartItems as $item)
               <tr>
                   <td>{{ $item->name }}</td>
                   <td>${{ $item->price }}</td>
                   <td>{{ $item->quantity }}</td>
                   <td>
                       <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger">Remove</button>
                       </form>
                   </td>
               </tr>
               @endforeach
           </tbody>
       </table>

       <a href="{{ url('/products') }}" class="btn btn-primary">Continue Shopping</a>
       <a href="{{ url('/checkout') }}" class="btn btn-success">Proceed to Checkout</a>
   </div>
@endsection
