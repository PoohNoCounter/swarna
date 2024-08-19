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
        $products = Product::paginate(12);
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

        $rentalDate = Carbon::parse($request->rental_date);
        $returnDate = Carbon::parse($request->return_date);
        $quantity = $request->quantity;

        if ($rentalDate->isSameDay($returnDate)) {
            $total = $product->price * $quantity;
        } else {
            $days = $rentalDate->diffInDays($returnDate);
            $total = $product->price * $quantity * $days;
        }

        $booking = Booking::create([
            'id' => Str::uuid(),
            'token' => bin2hex(random_bytes(8)),
            'product_id' => $product->id,
            'user_id' => auth()->user()->id,
            'location' => auth()->user()->location,
            'quantity' => $quantity,
            'status' => 'Cart',
            'rental_date' => $rentalDate,
            'return_date' => $returnDate,
            'command' => 'send:booking-notifications',
            'command_return' => 'send:deadline-notifications',
            'total' => $total,
        ]);

        // dd($booking);

        return redirect()->route('cart');
    }
}
