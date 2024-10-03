<?php
//ProductController: Displays a list of products and individual product details.
namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    // Display a list of products
    public function index()
    {
        $products = Product::all(); // Fetch all products from the database
        return view('products.index', compact('products')); // Pass products to the view
    }

    // Display a specific product
    public function show($id)
    {
        $product = Product::find($id); // Fetch the product by ID
        return view('products.show', compact('product')); // Pass the product to the view
    }
}
