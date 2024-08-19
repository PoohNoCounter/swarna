<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        {{ $booking->status }}
    </x-slot>

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="row m-0 p-3">
                    <div class="border-bottom">
                        <h3 class="font-weight-bold">{{ $booking->product->name }}</h3>
                        <p class="font-weight-bold">Sent Address</p>
                        <p class="my-0">{{ $booking->user->name }} | <a
                                href="https://wa.me/+62{{ $booking->User->no_hp }}" class="text-success"><i
                                    class="fa fa-whatsapp"></i> {{ $booking->User->no_hp }}</a></p>
                        <p class="mt-0">{{ $booking->location }}</p>
                    </div>
                    <div class="row m-0 pt-3">
                        <div class="col-md-6">
                            <p class="my-0">No. Booking</p>
                            <p class="my-0">Booking Time</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="my-0">{{ $booking->token }}</p>
                            <p class="my-0">{{ date('d F Y', strtotime($booking->created_at)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row p-3">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label">{{ __('Rental Date') }}</label>
                            <input type="text" class="form-control" placeholder="rental_date" name="rental_date"
                                id="rental_date" value="{{ date('Y-m-d', strtotime($booking->rental_date)) }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label">{{ __('Return Date') }}</label>
                            <input type="text" class="form-control" placeholder="return_date" name="return_date"
                                id="return_date" value="{{ date('Y-m-d', strtotime($booking->return_date)) }}"
                                disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($booking->status == 'Waiting')
            <div class="card col-md-3">
                @if (auth()->user()->role == 'admin')
                    <form class=" p-2" method="POST" action="{{ route('admin.booking.update', $booking->id) }}"
                        enctype="multipart/form-data">
                @endif
                @csrf
                @method('PUT')
                <div class="card-header">
                    <input type="hidden" name="status" id="status" value="Ongoing">
                    <h4 class="text-center font-weight-bold">Total :
                        Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}</h4>
                </div>
                <button type="submit" class="btn btn-block btn-success">Payment Confirmation</button>
                </form>
                @if (auth()->user()->role == 'admin')
                    <form class=" px-2 pb-3" method="POST" action="{{ route('admin.booking.update', $booking->id) }}"
                        enctype="multipart/form-data">
                @endif
                @csrf
                @method('PUT')
                <input type="hidden" name="status" id="status" value="Cancel">
                <button type="submit" class="btn btn-block btn-danger">Cancel</button>
                </form>
            </div>
        @elseif ($booking->status == 'Ongoing')
            <div class="card col-md-3">
                @if (auth()->user()->role == 'admin')
                    <form class=" p-2" method="POST" action="{{ route('admin.booking.update', $booking->id) }}"
                        enctype="multipart/form-data">
                @endif
                @csrf
                @method('PUT')
                <div class="card-header">
                    <input type="hidden" name="status" id="status" value="Done">
                    <h4 class="text-center font-weight-bold">Total :
                        Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}</h4>
                </div>
                <button type="submit" class="btn btn-block btn-success">Done</button>
                </form>
                @if (auth()->user()->role == 'admin')
                    <form class=" px-2 pb-3" method="POST" action="{{ route('admin.booking.update', $booking->id) }}"
                        enctype="multipart/form-data">
                @endif
                @csrf
                @method('PUT')
                <input type="hidden" name="status" id="status" value="Cancel">
                <button type="submit" class="btn btn-block btn-danger">Cancel</button>
                </form>
            </div>
        @elseif ($booking->status == 'Done')
            <div class="card col-md-3">
                <a href="https://wa.me/+62{{ $booking->no_hp }}" class="btn btn-block btn-success mt-3"><i
                        class="fa fa-whatsapp"></i> Chat
                    Customer</a>
            </div>
        @elseif ($booking->status == 'Cancel')
            <div class="card col-md-3">
                <a href="https://wa.me/+62{{ $booking->no_hp }}" class="btn btn-block btn-success mt-3"><i
                        class="fa fa-whatsapp"></i> Chat
                    Customer</a>
            </div>
        @endif
    </div>

    @section('activeBooking', 'aktif')
</x-admin-layout>
