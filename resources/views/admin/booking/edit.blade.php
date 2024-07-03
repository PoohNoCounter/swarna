<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Pesanan {{ $booking->status }}
    </x-slot>

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="row m-0 p-3">
                    <div class="border-bottom">
                        <p class="font-weight-bold">Alamat Pengiriman</p>
                        <p class="my-0">{{ $booking->User->name }} | <a href="https://wa.me/+62{{ $booking->User->no_hp }}"
                                class="text-success"><i class="fa fa-whatsapp"></i> {{ $booking->User->no_hp }}</a></p>
                        <p class="mt-0">{{ $booking->location }}</p>
                    </div>
                    <div class="row m-0 pt-3">
                        <div class="col-md-6">
                            <p class="my-0">No. Pesanan</p>
                            <p class="my-0">Waktu Pemesanan</p>
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
                            <label class="form-label">{{ __('Tanggal Sewa') }}</label>
                            <input type="text" class="form-control" placeholder="rental_date" name="rental_date"
                                id="rental_date" value="{{ date('Y-m-d', strtotime($booking->rental_date)) }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label">{{ __('Tanggal Pengembalian') }}</label>
                            <input type="text" class="form-control" placeholder="return_date" name="return_date"
                                id="return_date" value="{{ date('Y-m-d', strtotime($booking->return_date)) }}"
                                disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($booking->status == 'Menunggu Konfirmasi')
            <div class="card col-md-3">
                @if (auth()->user()->role == 'admin')
                    <form class=" p-2" method="POST" action="{{ route('admin.booking.update', $booking->id) }}"
                        enctype="multipart/form-data">
                @endif
                @csrf
                @method('PUT')
                <div class="card-header">
                    <input type="hidden" name="status" id="status" value="Diproses">
                    <h4 class="text-center font-weight-bold">Total : Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}</h4>
                </div>
                <button type="submit" class="btn btn-block btn-success">Konfirmasi Pembayaran</button>
                </form>
                @if (auth()->user()->role == 'admin')
                    <form class=" px-2 pb-3" method="POST" action="{{ route('admin.booking.update', $booking->id) }}"
                        enctype="multipart/form-data">
                @endif
                @csrf
                @method('PUT')
                <input type="hidden" name="status" id="status" value="Dibatalkan">
                <button type="submit" class="btn btn-block btn-danger">Batalkan Pesanan</button>
                </form>
            </div>
        @elseif ($booking->status == 'Diproses')
            <div class="card col-md-3">
                @if (auth()->user()->role == 'admin')
                    <form class=" p-2" method="POST" action="{{ route('admin.booking.update', $booking->id) }}"
                        enctype="multipart/form-data">
                @endif
                @csrf
                @method('PUT')
                <div class="card-header">
                    <input type="hidden" name="status" id="status" value="Selesai">
                    <h4 class="text-center font-weight-bold">Total : Rp{{ number_format($booking->total ?? 0, 0, ',', '.') }}</h4>
                </div>
                <button type="submit" class="btn btn-block btn-success">Pesanan Selesai</button>
                </form>
                @if (auth()->user()->role == 'admin')
                    <form class=" px-2 pb-3" method="POST" action="{{ route('admin.booking.update', $booking->id) }}"
                        enctype="multipart/form-data">
                @endif
                @csrf
                @method('PUT')
                <input type="hidden" name="status" id="status" value="Dibatalkan">
                <button type="submit" class="btn btn-block btn-danger">Batalkan Pesanan</button>
                </form>
            </div>
        @elseif ($booking->status == 'Selesai')
            <div class="card col-md-3">
                <a href="https://wa.me/+62{{ $booking->no_hp }}" class="btn btn-block btn-success mt-3"><i
                        class="fa fa-whatsapp"></i> Chat
                    Penyewa</a>
            </div>
        @elseif ($booking->status == 'Dibatalkan')
            <div class="card col-md-3">
                <a href="https://wa.me/+62{{ $booking->no_hp }}" class="btn btn-block btn-success mt-3"><i
                        class="fa fa-whatsapp"></i> Chat
                    Penyewa</a>
            </div>
        @endif
    </div>

    @section('activeBooking', 'aktif')
</x-admin-layout>
