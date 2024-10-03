@extends('layouts.app')

   @section('content')
   <div class="container">
       <h1>Checkout</h1>
       <form action="{{ route('checkout.process') }}" method="POST" id="payment-form">
           @csrf
           <div class="form-group">
               <label for="card-element">Credit or debit card</label>
               <div id="card-element"></div>
               <div id="card-errors" role="alert"></div>
           </div>
           <button type="submit" class="btn btn-primary mt-4">Submit Payment</button>
       </form>
   </div>

   <script src="https://js.stripe.com/v3/"></script>
   <script>
       var stripe = Stripe('{{ env('STRIPE_KEY') }}');
       var elements = stripe.elements();
       var card = elements.create('card');
       card.mount('#card-element');

       var form = document.getElementById('payment-form');
       form.addEventListener('submit', function(event) {
           event.preventDefault();
           stripe.createToken(card).then(function(result) {
               if (result.error) {
                   var errorElement = document.getElementById('card-errors');
                   errorElement.textContent = result.error.message;
               } else {
                   var hiddenInput = document.createElement('input');
                   hiddenInput.setAttribute('type', 'hidden');
                   hiddenInput.setAttribute('name', 'stripeToken');
                   hiddenInput.setAttribute('value', result.token.id);
                   form.appendChild(hiddenInput);
                   form.submit();
               }
           });
       });
   </script>
   @endsection
