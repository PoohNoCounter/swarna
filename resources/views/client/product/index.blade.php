@extends('layouts.client.app')

@section('title', 'Product')

@section('textProduct', 'aktif rounded')

@section('content')

    <div class="text-center py-5">
        <div class="container my-5">
            <h3 class="text-center py-1 px-3 fw-bold" style="color: #0093E9;">
                Product
            </h3>
            <div class="row kartu-img pt-2">
                <div class="col-md-4 col-4">
                    <img class="img img-fluid pb-3" src="{{ asset('assets/img/pk (1).jpg') }}" alt="">
                </div>
                <div class="col-md-2 col-2">
                    <img class="img img-fluid pb-3" src="{{ asset('assets/img/pk (15).jpg') }}" alt="">
                    <img class="img img-fluid pb-3" src="{{ asset('assets/img/pk (16).jpg') }}" alt="">
                </div>
                <div class="col-md-4 col-4">
                    <img class="img img-fluid pb-3" src="{{ asset('assets/img/pk (20).jpg') }}" alt="">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <img class="img img-fluid pb-3" src="{{ asset('assets/img/pk (11).jpg') }}" alt="">
                        </div>
                        <div class="col-md-6 col-6">
                            <img class="img img-fluid pb-3" src="{{ asset('assets/img/pk (12).jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-2">
                    <img class="img img-fluid pb-3" src="{{ asset('assets/img/pk (17).jpg') }}" alt="">
                    <img class="img img-fluid pb-3" src="{{ asset('assets/img/pk (18).jpg') }}" alt="">
                </div>
            </div>
        </div>

        <div class="container pb-3">
            <h3 class="text-center py-1 px-3 fw-bold" style="color: #0093E9;">
                FEATURED PRODUCTS
            </h3>
            <div class="row">
                @foreach ($packages as $package)
                    @if ($package->Category->name == 'Graduation Personal')
                        <div class="col-sm-4 col-md-4 p-3">
                            <div class="card border rounded p-3">
                                <img class="img img-fluid col-12" loading="fuzy"
                                    src="{{ asset('assets/img/' . $package->img) }}" alt="">
                                <h4>{{ $package->name }}</h4>
                                <p>
                                <ol class="text-justify">

                                </ol>
                                </p>
                                <h3><b>Rp{{ number_format($package->price, 0, ',', '.') }}</b></h3>
                                <a href="{{ route('product.show', $package->id) }}"
                                    class="btn text-white aktif border col-12">Booking Now
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $packages->links() }}
            </div>
        </div>

    </div>

@endsection
