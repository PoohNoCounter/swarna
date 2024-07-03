<?php
use Carbon\Carbon;
?>
@extends('layouts.client.app')

@section('title', 'Jadwal')

@section('textEvent', 'primary-bg rounded')

@section('content')

    <div class="text-center py-5">
        <div class="container py-5">
            <div class="row">
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
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $schedules->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeLinks = document.querySelectorAll('.type-link');
            const productCards = document.querySelectorAll('.product-card');
            const allTypesLink = document.getElementById('all-types');

            function filterProducts(typeId) {
                productCards.forEach(card => {
                    if (typeId === null || card.getAttribute('data-type-id') == typeId) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            typeLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const typeId = this.getAttribute('data-type-id');
                    filterProducts(typeId);
                });
            });

            allTypesLink.addEventListener('click', function(event) {
                event.preventDefault();
                filterProducts(null);
            });

            // Tampilkan semua produk pada awal halaman di-load
            filterProducts(null);
        });
    </script>

@endsection
