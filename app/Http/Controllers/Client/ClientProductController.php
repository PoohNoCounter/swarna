<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ClientProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('client.product.index', compact('products'));
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('client.product.show', compact('product'));
    }
}
