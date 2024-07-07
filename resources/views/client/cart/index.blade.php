@extends('layouts.client.app')

@section('title', 'Cart')

@section('textCart', 'primary-bg text-white rounded')

@section('content')

    <div class="py-5">
        <div class="container pt-5 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-tabs">
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade active show" id="masuk" role="tabpanel"
                                    aria-labelledby="masuk-tab">
                                    @foreach ($bookings->where('status', 'Cart') as $booking)
                                        @if ($booking->User->id == auth()->user()->id)
                                            <a href="{{ route('booking.show', $booking->id) }}"
                                                class="card card-warning card-outline py-3 px-4">
                                                <div class="row">
                                                    <div class="col-md-1 mb-3">
                                                        @if ($booking->Product->img == null)
                                                            <img class="img img-fluid rounded pt-4"
                                                                src="{{ asset('assets/profile/default.png') }}"
                                                                alt="{{ $booking->Product->name }}" width="100">
                                                        @else
                                                            <img class="img img-fluid rounded pt-4"
                                                                src="{{ asset('assets/img/' . $booking->Product->img) }}"
                                                                alt="{{ $booking->Product->img }}" width="100"
                                                                loading="lazy">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-5 mb-3">
                                                        <h3>{{ $booking->Product->name }}</h3>
                                                        <p>Qty : {{ $booking->quantity }}</p>
                                                        <div>No. Booking</div>
                                                        <div>Booking Time</div>
                                                    </div>
                                                    <div class="col-md-6 mb-3 text-right">
                                                        <p>Rp{{ number_format($booking->Product->price ?? 0, 0, ',', '.') }}
                                                        </p>
                                                        <h3 class="font-weight-bold">Total :
                                                            Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                                        </h3>
                                                        <div>{{ $booking->token ?? '-' }}</div>
                                                        <div>
                                                            {{ date('d F Y', strtotime($booking->rental_date)) }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pt-3 border-top">
                                                        <form action="{{ route('cart.destroy', $booking->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Remove</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-6 pt-3 border-top text-right">
                                                        <form action="{{ route('cart.update', $booking->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-danger">Checkout</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
