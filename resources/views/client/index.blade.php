<?php
use Carbon\Carbon;
?>

@extends('layouts.client.app')

@section('title', 'Beranda')

@section('textHome', 'primary-bg rounded')

@section('content')

    <div class="text-center py-5">
        <div class="container my-5">
            <img class="img img-fluid" src="{{ asset('assets/img/bg-beranda.png') }}" alt="">
        </div>

        <div class="container pb-5">
            <div class="row">
                @foreach ($categories as $category)
                    <a href="{{ route('beranda.detail', $category->id) }}" class="col-1 col-md-1">
                        <div class="card border rounded p-2">
                            <img class="img img-fluid" loading="fuzy" width="100px"
                                src="{{ asset('assets/img/' . $category->img) }}" alt="">
                        </div>
                        <p class="my-0">{{ $category->name }}</p>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="container">
            <h3 class="text-center py-1 px-3 fw-bold">
                FEATURED PRODUCTS
            </h3>

            <div class="row mb-3">
                <h4 class="text-left py-1 fw-bold">EVENT/SERVICES</h4>
                @foreach ($schedules as $schedule)
                    <a href="{{ route('schedule.show', $schedule->id) }}" class="col-3 col-md-3">
                        <div class="card border rounded p-2">
                            <p class="text-left">{{ Carbon::parse($schedule->datetime)->translatedFormat('d F Y') }}
                            </p>
                            <h3 class="text-left">{{ Carbon::parse($schedule->datetime)->translatedFormat('l') }}</h3>
                            <h3 class="text-left fw-bold">{{ $schedule->name }}</h3>
                            <p class="text-left border-bottom pb-2">{{ $schedule->location }}</p>
                            <h4 class="text-left fw-bold">Deskripsi Event</h4>
                            <p class="text-left">{{ $schedule->desc }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="row">
                <h4 class="text-left py-1 fw-bold">PRODUCT/TOOLS</h4>
                @foreach ($products as $product)
                    <a href="{{ route('product.show', $product->id) }}" class="col-4 col-md-3 mb-3 product-card"
                        data-type-id="{{ $product->type_id }}">
                        <div class="border rounded p-2 mx-auto">
                            <div class="border-bottom p-2 mb-2">
                                <img class="img img-fluid" loading="lazy" width="100px"
                                    src="{{ asset('assets/img/' . $product->img) }}" alt="">
                            </div>
                            <p class="my-0 text-left fw-bold">Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}/day
                            </p>
                            <p class="my-0 text-left">{{ $product->name }} - {{ $product->type->category->name }}
                                ({{ $product->type->name }})
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    </div>

@endsection
