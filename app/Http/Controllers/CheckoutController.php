<?php
//CheckoutController: Handles checkout and payment processing with Stripe, and creates the order and order items in the database.

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Darryldecode\Cart\Facades\CartFacade as Cart; // Import the Cart facade

class CheckoutController extends Controller
{
    // Show the checkout page
    public function index()
    {
        $cartItems = Cart::getContent(); // Retrieve cart items
        return view('checkout.index', compact('cartItems')); // Pass cart items to the view
    }

    // Process the payment and create the order
    public function processPayment(Request $request)
    {
        // Set Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a Stripe charge
        $charge = Charge::create([
            'amount' => Cart::getTotal() * 100, // Convert total to cents
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Order from Boulangerie',
        ]);

        // Create a new order
        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'total_price' => Cart::getTotal(),
        ]);

        // Store each cart item as an order item
        foreach (Cart::getContent() as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Clear the cart after successful payment
        Cart::clear();

        // Redirect the user after order is complete
        return redirect()->route('products.index')->with('success', 'Payment successful! Your order has been placed.');
    }
}
