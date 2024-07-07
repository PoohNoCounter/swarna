@extends('layouts.client.app')

@section('title', 'Detail Booking')

@section('textBooking', 'primary-bg text-white rounded')

@section('content')

    <div class="py-5">
        <div class="container pt-5 pb-3">
            <div class="row">
                <a href="{{ route('booking') }}"><i class="fa fa-arrow-left text-dark mb-3"></i></a>
                <div class="card">
                    <div class="row m-0 p-3">
                        <div class="border-bottom">
                            <p class="font-weight-bold">Sent Address</p>
                            <p class="m-0">{{ $booking->User->name }} | <a
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
                                <p class="m-0">{{ date('d F Y', strtotime($booking->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
