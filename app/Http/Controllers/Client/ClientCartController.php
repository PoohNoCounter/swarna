<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Product;

class ClientCartController extends Controller
{
    public function index()
    {
        $bookings = Booking::all()->reverse();
        return view('client.cart.index', compact('bookings'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update([
            'location' => auth()->user()->location,
            'status' => 'Waiting',
        ]);
        return redirect()->route('booking');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return back();
    }
}
