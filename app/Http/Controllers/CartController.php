<?php
//CartController: Manages adding, viewing, and removing items from the cart.
namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add a product to the cart
    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array() // You can add custom attributes here if needed
        ));

        return redirect()->route('cart.index'); // Redirect to the cart page
    }

    // View the cart
    public function index()
    {
        $cartItems = Cart::getContent(); // Get all cart items
        return view('cart.index', compact('cartItems')); // Pass cart items to the view
    }

    // Remove a product from the cart
    public function remove($id)
    {
        Cart::remove($id); // Remove the item from the cart by its ID
        return redirect()->route('cart.index');
    }
}
