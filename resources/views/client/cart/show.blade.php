@extends('layouts.client.app')

@section('title', 'Detail Cart')

@section('textCart', 'primary-bg text-white rounded')

@section('content')

    <div class="py-5">
        <div class="container pt-5 pb-3">
            <div class="row">
                <a href="{{ route('cart') }}"><i class="fa fa-arrow-left text-dark mb-3"></i></a>
                <div class="col-md-9">
                    <div class="card">
                        <div class="row m-0 p-3">
                            <div class="border-bottom">
                                <h3 class="font-weight-bold">{{ Str::limit($booking->product->name ?? '-', 12) }}</h3>
                                <p class="font-weight-bold">Sent Address</p>
                                <p class="m-0">{{ $booking->user->name }} | <a
                                        href="https://wa.me/+62{{ $booking->User->no_hp }}" class="text-success"><i
                                            class="fa fa-whatsapp"></i> {{ $booking->User->no_hp }}</a></p>
                                <p class="mt-0">{{ $booking->location }}</p>
                            </div>
                            <div class="row m-0 pt-3">
                                <div class="col-md-6">
                                    <p class="m-0">No. Booking</p>
                                    <p class="m-0">Booking Time</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <p class="m-0">{{ $booking->token }}</p>
                                    <p class="m-0">{{ date('d F Y', strtotime($booking->rental_date)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card px-3 pt-3">
                        <h4>Payment Method</h4>
                        <a class="row text-success" href="https://wa.me/+62081286388882" class="text-success">
                            <div class="col-md-6">
                                <p>Whatsapp <br>
                                    081286388882
                                </p>
                            </div>
                            <div class="col-md-6 text-right">
                                <i class="fa fa-whatsapp fa-2x pt-3"></i>
                            </div>
                        </a>
                    </div>
                    <div class="card p-3">
                        <h5>Total:</h5>
                        <h4 class="fw-bold">Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}</h4>
                        <a href="https://wa.me/+62081286388882?text=ID%20Pesanan%3A%20{{ $booking->token }}%0ANama%20Pemesan%3A%20{{ $booking->user->name }}%0AEmail%20Pemesan%3A%20{{ $booking->User->email }}%0ANama%20Produk%3A%20{{ Str::limit($booking->product->name ?? '-', 12) }}%0AJumlah%20Pemesanan%3A%20{{ $booking->quantity }}%0ALokasi%20Penyewaan%3A%20{{ $booking->location }}%0AWaktu%20Penyewaan%3A%20{{ date('d F Y', strtotime($booking->rental_date)) }}%0AWaktu%20Pengembalian%3A%20{{ date('d F Y', strtotime($booking->return_date)) }}%0ABooking%20Total%3A%20*Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}*%0A"
                            class="btn btn-success">Go to Whatsapp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
