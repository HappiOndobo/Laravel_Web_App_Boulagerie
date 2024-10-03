<?php
//OrdersController: Allows users to view their orders.
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    // Display the user's orders
    public function index()
    {
        // Retrieve orders for the authenticated user
        $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->get();

        // Pass the orders to the view
        return view('orders.index', compact('orders'));
    }
}
