@extends('layouts.client.app')

@section('title', 'Booking')

@section('textBooking', 'primary-bg rounded')

@section('content')

    <div class="py-5">
        <div class="container pt-5 pb-3">
            <div class="col-12 col-sm-12">
                <div class="card card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="masuk-tab" data-toggle="pill" href="#masuk" role="tab"
                                    aria-controls="masuk" aria-selected="true">Belum Bayar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ongoing-tab" data-toggle="pill" href="#ongoing" role="tab"
                                    aria-controls="ongoing" aria-selected="false">Ongoing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="selesai-tab" data-toggle="pill" href="#selesai" role="tab"
                                    aria-controls="selesai" aria-selected="false">Selesai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="batal-tab" data-toggle="pill" href="#batal" role="tab"
                                    aria-controls="batal" aria-selected="false">Dibatalkan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade active show" id="masuk" role="tabpanel"
                                aria-labelledby="masuk-tab">
                                @foreach ($bookings->where('status', 'Menunggu Konfirmasi') as $booking)
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
                                                    <div>No. Pesanan</div>
                                                    <div>Waktu Pemesanan</div>
                                                </div>
                                                <div class="col-md-6 mb-3 text-right">
                                                    <p>Rp{{ number_format($booking->Product->price ?? 0, 0, ',', '.') }}</p>
                                                    <h3>Total Pesanan :
                                                        Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                                    </h3>
                                                    <div>{{ $booking->token ?? '-' }}</div>
                                                    <div>
                                                        {{ date('d F Y', strtotime($booking->created_at)) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pt-3 border-top">Klik untuk melihat detail Pemesanan
                                                </div>
                                                <div class="col-md-6 pt-3 border-top text-right"><span
                                                        class="badge badge-warning">{{ $booking->status ?? '-' }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
                                @foreach ($bookings->where('status', 'Diproses') as $booking)
                                    @if ($booking->User->id == auth()->user()->id)
                                        <a href="{{ route('booking.show', $booking->id) }}"
                                            class="card card-primary card-outline py-3 px-4">
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
                                                    <div>No. Pesanan</div>
                                                    <div>Waktu Pemesanan</div>
                                                </div>
                                                <div class="col-md-6 mb-3 text-right">
                                                    <p>Rp{{ number_format($booking->Product->price ?? 0, 0, ',', '.') }}
                                                    </p>
                                                    <h3>Total Pesanan :
                                                        Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                                    </h3>
                                                    <div>{{ $booking->token ?? '-' }}</div>
                                                    <div>
                                                        {{ date('d F Y', strtotime($booking->created_at)) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pt-3 border-top">Klik untuk melihat detail Pemesanan
                                                </div>
                                                <div class="col-md-6 pt-3 border-top text-right"><span
                                                        class="badge badge-primary">{{ $booking->status ?? '-' }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                                @foreach ($bookings->where('status', 'Selesai') as $booking)
                                    @if ($booking->User->id == auth()->user()->id)
                                        <a href="{{ route('booking.show', $booking->id) }}"
                                            class="card card-success card-outline py-3 px-4">
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
                                                    <div>No. Pesanan</div>
                                                    <div>Waktu Pemesanan</div>
                                                </div>
                                                <div class="col-md-6 mb-3 text-right">
                                                    <p>Rp{{ number_format($booking->Product->price ?? 0, 0, ',', '.') }}
                                                    </p>
                                                    <h3>Total Pesanan :
                                                        Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                                    </h3>
                                                    <div>{{ $booking->token ?? '-' }}</div>
                                                    <div>
                                                        {{ date('d F Y', strtotime($booking->created_at)) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pt-3 border-top">Klik untuk melihat detail Pemesanan
                                                </div>
                                                <div class="col-md-6 pt-3 border-top text-right"><span
                                                        class="badge badge-success">{{ $booking->status ?? '-' }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="batal" role="tabpanel" aria-labelledby="batal-tab">
                                @foreach ($bookings->where('status', 'Dibatalkan') as $booking)
                                    @if ($booking->User->id == auth()->user()->id)
                                        <a href="{{ route('booking.show', $booking->id) }}"
                                            class="card card-danger card-outline py-3 px-4">
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
                                                    <div>No. Pesanan</div>
                                                    <div>Waktu Pemesanan</div>
                                                </div>
                                                <div class="col-md-6 mb-3 text-right">
                                                    <p>Rp{{ number_format($booking->Product->price ?? 0, 0, ',', '.') }}
                                                    </p>
                                                    <h3>Total Pesanan :
                                                        Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                                    </h3>
                                                    <div>{{ $booking->token ?? '-' }}</div>
                                                    <div>
                                                        {{ date('d F Y', strtotime($booking->created_at)) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pt-3 border-top">Klik untuk melihat detail Pemesanan
                                                </div>
                                                <div class="col-md-6 pt-3 border-top text-right"><span
                                                        class="badge badge-danger">{{ $booking->status ?? '-' }}</span>
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

@endsection
