<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Booking;
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

    public function cart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'rental_date' => 'required',
            'return_date' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);

        $booking = Booking::create([
            'id' => Str::uuid(),
            'token' => bin2hex(random_bytes(8)),
            'product_id' => $product->id,
            'user_id' => auth()->user()->id,
            'location' => auth()->user()->location,
            'quantity' => $request->quantity,
            'status' => 'Cart',
            'rental_date' => $request->rental_date,
            'return_date' => $request->return_date,
            'total' => $product->price * $request->quantity * Carbon::parse($request->rental_date)->diffInDays(Carbon::parse($request->return_date)),
        ]);

        // dd($booking);

        return redirect()->route('cart');
    }
}
