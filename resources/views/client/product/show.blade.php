@extends('layouts.client.app')

@section('title', 'Detail Product')

@section('textProduct', 'primary-bg rounded')

@section('content')

    <div class="py-5">
        <div class="container pt-5 pb-3">
            <div class="card card-primary card-outline">
                <div class="row p-3">
                    <div class="col-md-6 rounded text-center">
                        <img class="img img-fluid" width="500" src="{{ asset('assets/img/' . $product->img) }}"
                            alt="">
                    </div>
                    <div class="col-md-5 text-justify p-3">
                        <h2>{{ $product->name }}</h2>
                        <h3 class="fw-bold">Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}</h3>
                        <div class="mb-3">
                            <h5>Pilih Jumlah</h5>
                            <p>3</p>
                        </div>
                        <div class="mb-3">
                            <h5 class="fw-bold">Jenis Produk</h5>
                            <p>{{ $product->type->category->name }} ({{ $product->type->name }})</p>
                        </div>
                        <div class="mb-3">
                            <h5 class="fw-bold">Deskripsi</h5>
                            <p>{{ $product->desc }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
