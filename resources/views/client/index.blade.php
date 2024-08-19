<?php
use Carbon\Carbon;
?>

@extends('layouts.client.app')

@section('title', 'Beranda')

@section('textHome', 'primary-bg text-white rounded')

@section('content')

    <div class="text-center my-5">
        <div class="my-5 secondary-bg">
            <img class="img img-fluid m-0 p-0" src="{{ asset('assets/img/bg.png') }}" alt="">
            <div class="container py-3">
                <div class="row py-3 d-flex justify-content-center">
                    @foreach ($categories as $category)
                        <a href="{{ route('beranda.detail', $category->id) }}" class="col-4 col-md-1">
                            <div class="card border rounded px-2">
                                <img class="img img-fluid" loading="fuzy" width="100px"
                                    src="{{ asset('assets/img/' . $category->img) }}" alt="">
                            </div>
                            <p class="mt-0 text-white mb-3">{{ Str::limit($category->name ?? '-', 12) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="container">
            <h3 class="text-center py-1 px-3 fw-bold">
                FEATURED PRODUCTS
            </h3>

            <div class="row mb-3">
                <h4 class="text-left py-1 fw-bold">EVENT/SERVICES</h4>
                @foreach ($schedules as $schedule)
                    <a href="{{ route('schedule.show', $schedule->id) }}" class="col-6 col-md-3">
                        <div class="card bg-primary border rounded p-2">
                            <p class="text-left">{{ Carbon::parse($schedule->datetime)->translatedFormat('d F Y') }}
                            </p>
                            <h3 class="text-left">{{ Carbon::parse($schedule->datetime)->translatedFormat('l') }}</h3>
                            <h3 class="text-left fw-bold">{{ Str::limit($schedule->name ?? '-', 12) }}</h3>
                            <p class="text-left border-bottom pb-2">{{ Str::limit($schedule->location ?? '-', 30) }}</p>
                            <h4 class="text-left fw-bold">Event Description</h4>
                            <p class="text-left">{{ Str::limit($schedule->desc ?? '-', 30) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="row">
                <h4 class="text-left py-1 fw-bold">PRODUCT/TOOLS</h4>
                @foreach ($products as $product)
                    <a href="{{ route('product.show', $product->id) }}" class="col-4 col-md-3 mb-3 product-card"
                        data-type-id="{{ $product->type_id }}">
                        <div class="border rounded p-2 mx-auto secondary-bg">
                            <div class="border-bottom p-2 mb-2 bg-light">
                                <img class="img img-fluid" loading="lazy" width="200px"
                                    src="{{ asset('assets/img/' . $product->img) }}" alt="">
                            </div>
                            <p class="my-0 text-left fw-bold">Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}/day
                            </p>
                            <p class="my-0 text-left">{{ Str::limit($product->name ?? '-', 20) }} <br>
                                {{ Str::limit($product->type->category->name ?? '-', 12) }}
                                ({{ Str::limit($product->type->name ?? '-', 12) }})
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    </div>

@endsection
