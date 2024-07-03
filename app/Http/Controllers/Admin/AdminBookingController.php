<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class AdminBookingController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $bookings = Booking::all();
        return view('admin.booking.index', compact('bookings', 'products'));
    }

    public function edit(Request $request, $id)
    {
        $products = Product::all();
        $booking = Booking::findOrfail($id);
        return view('admin.booking.edit', compact('booking', 'products'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'status' => 'required',
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

        return back()->with('alert', 'Berhasil Edit Data booking!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return back()->with('alert', 'Berhasil Hapus Data booking!');
    }
}
