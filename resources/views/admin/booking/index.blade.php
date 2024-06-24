<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Pesanan
    </x-slot>

    <div class="col-12 col-sm-12">
        <div class="card card-info card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="masuk-tab" data-toggle="pill" href="#masuk" role="tab"
                            aria-controls="masuk" aria-selected="true">Perlu Dikirim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ongoing-tab" data-toggle="pill" href="#ongoing" role="tab"
                            aria-controls="ongoing" aria-selected="false">Dikirim</a>
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
                    <div class="tab-pane fade active show" id="masuk" role="tabpanel" aria-labelledby="masuk-tab">
                        @foreach ($bookings->where('status', 'Menunggu Konfirmasi') as $booking)
                            <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                class="card card-danger card-outline py-3 px-4">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        @if ($booking->Product->img == null)
                                            <img class="img img-fluid rounded pt-2" src="{{ asset('assets/profile/default.png') }}"
                                                alt="{{ $booking->Product->name }}" width="100">
                                        @else
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/img/' . $booking->Product->img) }}"
                                                alt="{{ $booking->Product->img }}" width="100" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <h3>{{ $booking->Product->name }}</h3>
                                        <div>Qty : {{ $booking->quantity }}</div>
                                        <div>{{ $booking->quantity }} Produk</div>
                                    </div>
                                    <div class="col-md-6 mb-3 text-right">
                                        <p>Rp{{ number_format($booking->Product->price ?? 0, 0, ',', '.') }}</p>
                                        <h3>Total Pesanan : Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                        </h3>
                                    </div>
                                    <div class="col-md-6 pt-3 border-top"></div>
                                    <div class="col-md-6 pt-3 border-top text-right"><span
                                            class="btn btn-danger">Periksa Rincian</span></div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
                        @foreach ($bookings->where('status', 'Diproses') as $booking)
                            <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                class="card card-danger card-outline py-3 px-4">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        @if ($booking->Product->img == null)
                                            <img class="img img-fluid rounded pt-2" src="{{ asset('assets/profile/default.png') }}"
                                                alt="{{ $booking->Product->name }}" width="100">
                                        @else
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/img/' . $booking->Product->img) }}"
                                                alt="{{ $booking->Product->img }}" width="100" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <h3>{{ $booking->Product->name }}</h3>
                                        <div>Qty : {{ $booking->quantity }}</div>
                                        <div>{{ $booking->quantity }} Produk</div>
                                    </div>
                                    <div class="col-md-6 mb-3 text-right">
                                        <p>Rp{{ number_format($booking->Product->price ?? 0, 0, ',', '.') }}</p>
                                        <h3>Total Pesanan : Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                        </h3>
                                    </div>
                                    <div class="col-md-6 pt-3 border-top"></div>
                                    <div class="col-md-6 pt-3 border-top text-right"><span
                                            class="btn btn-danger">Periksa Rincian</span></div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                        @foreach ($bookings->where('status', 'Selesai') as $booking)
                            <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                class="card card-danger card-outline py-3 px-4">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        @if ($booking->Product->img == null)
                                            <img class="img img-fluid rounded pt-2" src="{{ asset('assets/profile/default.png') }}"
                                                alt="{{ $booking->Product->name }}" width="100">
                                        @else
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/img/' . $booking->Product->img) }}"
                                                alt="{{ $booking->Product->img }}" width="100" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <h3>{{ $booking->Product->name }}</h3>
                                        <div>Qty : {{ $booking->quantity }}</div>
                                        <div>{{ $booking->quantity }} Produk</div>
                                    </div>
                                    <div class="col-md-6 mb-3 text-right">
                                        <p>Rp{{ number_format($booking->Product->price ?? 0, 0, ',', '.') }}</p>
                                        <h3>Total Pesanan : Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                        </h3>
                                    </div>
                                    <div class="col-md-6 pt-3 border-top"></div>
                                    <div class="col-md-6 pt-3 border-top text-right"><span
                                            class="btn btn-danger">Periksa Rincian</span></div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="batal" role="tabpanel" aria-labelledby="batal-tab">
                        @foreach ($bookings->where('status', 'Dibatalkan') as $booking)
                            <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                class="card card-danger card-outline py-3 px-4">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        @if ($booking->Product->img == null)
                                            <img class="img img-fluid rounded pt-2" src="{{ asset('assets/profile/default.png') }}"
                                                alt="{{ $booking->Product->name }}" width="100">
                                        @else
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/img/' . $booking->Product->img) }}"
                                                alt="{{ $booking->Product->img }}" width="100" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <h3>{{ $booking->Product->name }}</h3>
                                        <div>Qty : {{ $booking->quantity }}</div>
                                        <div>{{ $booking->quantity }} Produk</div>
                                    </div>
                                    <div class="col-md-6 mb-3 text-right">
                                        <p>Rp{{ number_format($booking->Product->price ?? 0, 0, ',', '.') }}</p>
                                        <h3>Total Pesanan : Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                        </h3>
                                    </div>
                                    <div class="col-md-6 pt-3 border-top"></div>
                                    <div class="col-md-6 pt-3 border-top text-right"><span
                                            class="btn btn-danger">Periksa Rincian</span></div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('activeBooking', 'aktif')
</x-admin-layout>
