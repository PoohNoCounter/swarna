<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class ClientBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all()->reverse();
        return view('client.booking.index', compact('bookings'));
    }

    public function show(string $id)
    {
        $booking = Booking::findOrFail($id);
        return view('client.booking.show', compact('booking'));
    }
}
