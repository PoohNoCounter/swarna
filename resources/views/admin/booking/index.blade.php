<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        {{ __('Booking') }}
    </x-slot>

    <div class="col-12 col-sm-12">
        <div class="card card-info card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="masuk-tab" data-toggle="pill" href="#masuk" role="tab"
                            aria-controls="masuk" aria-selected="true">Not Yet Paid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ongoing-tab" data-toggle="pill" href="#ongoing" role="tab"
                            aria-controls="ongoing" aria-selected="false">Ongoing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Done-tab" data-toggle="pill" href="#Done" role="tab"
                            aria-controls="Done" aria-selected="false">Done</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="batal-tab" data-toggle="pill" href="#batal" role="tab"
                            aria-controls="batal" aria-selected="false">Cancel</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade active show" id="masuk" role="tabpanel" aria-labelledby="masuk-tab">
                        @foreach ($bookings->where('status', 'Waiting') as $booking)
                            <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                class="card card-danger card-outline py-3 px-4">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        @if ($booking->product->img == null)
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/profile/default.png') }}"
                                                alt="{{ Str::limit($booking->product->name ?? '-', 12) }}"
                                                width="100">
                                        @else
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/img/' . $booking->product->img) }}"
                                                alt="{{ $booking->product->img }}" width="100" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <h3>{{ Str::limit($booking->product->name ?? '-', 12) }}</h3>
                                        <div>Qty : {{ $booking->quantity }}</div>
                                        <div>{{ $booking->quantity }} Product</div>
                                    </div>
                                    <div class="col-md-6 mb-3 text-right">
                                        <p>Rp{{ number_format($booking->product->price ?? 0, 0, ',', '.') }}</p>
                                        <h3 class="fw-bold">Total :
                                            Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                        </h3>
                                    </div>
                                    <div class="col-md-6 pt-3 border-top"></div>
                                    <div class="col-md-6 pt-3 border-top text-right"><span
                                            class="btn btn-danger">Detail</span></div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
                        @foreach ($bookings->where('status', 'Ongoing') as $booking)
                            <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                class="card card-danger card-outline py-3 px-4">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        @if ($booking->product->img == null)
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/profile/default.png') }}"
                                                alt="{{ Str::limit($booking->product->name ?? '-', 12) }}"
                                                width="100">
                                        @else
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/img/' . $booking->product->img) }}"
                                                alt="{{ $booking->product->img }}" width="100" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <h3>{{ Str::limit($booking->product->name ?? '-', 12) }}</h3>
                                        <div>Qty : {{ $booking->quantity }}</div>
                                        <div>{{ $booking->quantity }} Product</div>
                                    </div>
                                    <div class="col-md-6 mb-3 text-right">
                                        <p>Rp{{ number_format($booking->product->price ?? 0, 0, ',', '.') }}</p>
                                        <h3 class="fw-bold">Total :
                                            Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                        </h3>
                                    </div>
                                    <div class="col-md-6 pt-3 border-top"></div>
                                    <div class="col-md-6 pt-3 border-top text-right"><span
                                            class="btn btn-danger">Detail</span></div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="Done" role="tabpanel" aria-labelledby="Done-tab">
                        @foreach ($bookings->where('status', 'Done') as $booking)
                            <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                class="card card-danger card-outline py-3 px-4">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        @if ($booking->product->img == null)
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/profile/default.png') }}"
                                                alt="{{ Str::limit($booking->product->name ?? '-', 12) }}"
                                                width="100">
                                        @else
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/img/' . $booking->product->img) }}"
                                                alt="{{ $booking->product->img }}" width="100" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <h3>{{ Str::limit($booking->product->name ?? '-', 12) }}</h3>
                                        <div>Qty : {{ $booking->quantity }}</div>
                                        <div>{{ $booking->quantity }} Product</div>
                                    </div>
                                    <div class="col-md-6 mb-3 text-right">
                                        <p>Rp{{ number_format($booking->product->price ?? 0, 0, ',', '.') }}</p>
                                        <h3 class="fw-bold">Total :
                                            Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                        </h3>
                                    </div>
                                    <div class="col-md-6 pt-3 border-top"></div>
                                    <div class="col-md-6 pt-3 border-top text-right"><span
                                            class="btn btn-danger">Detail</span></div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="batal" role="tabpanel" aria-labelledby="batal-tab">
                        @foreach ($bookings->where('status', 'Cancel') as $booking)
                            <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                class="card card-danger card-outline py-3 px-4">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        @if ($booking->product->img == null)
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/profile/default.png') }}"
                                                alt="{{ Str::limit($booking->product->name ?? '-', 12) }}"
                                                width="100">
                                        @else
                                            <img class="img img-fluid rounded pt-2"
                                                src="{{ asset('assets/img/' . $booking->product->img) }}"
                                                alt="{{ $booking->product->img }}" width="100" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <h3>{{ Str::limit($booking->product->name ?? '-', 12) }}</h3>
                                        <div>Qty : {{ $booking->quantity }}</div>
                                        <div>{{ $booking->quantity }} Product</div>
                                    </div>
                                    <div class="col-md-6 mb-3 text-right">
                                        <p>Rp{{ number_format($booking->product->price ?? 0, 0, ',', '.') }}</p>
                                        <h3 class="fw-bold">Total :
                                            Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}
                                        </h3>
                                    </div>
                                    <div class="col-md-6 pt-3 border-top"></div>
                                    <div class="col-md-6 pt-3 border-top text-right"><span
                                            class="btn btn-danger">Detail</span></div>
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
