@extends('layouts.client.app')

@section('title', 'Product')

@section('textProduct', 'primary-bg text-white rounded')

@section('content')

    <div class="text-center py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-2 pt-3 secondary-bg rounded">
                    <a href="#" class="card border rounded p-2" id="all-types">
                        <p class="my-0">All</p>
                    </a>
                    @foreach ($types as $type)
                        <a href="#" class="card border rounded p-2 type-link" data-type-id="{{ $type->id }}">
                            <p class="my-0">{{ $type->name }}</p>
                        </a>
                    @endforeach
                </div>
                <div class="col-md-10 ps-5">
                    <div class="row">
                        <div class="container mb-3">
                            <div class="card border rounded p-2 col-md-1">
                                <img class="img img-fluid" loading="lazy" width="100px"
                                    src="{{ asset('assets/img/' . $category->img) }}" alt="">
                            </div>
                            <p class="text-left">{{ $category->name }}</p>
                        </div>
                        @foreach ($products as $product)
                            <a href="{{ route('product.show', $product->id) }}" class="col-4 col-md-4 mb-3 product-card"
                                data-type-id="{{ $product->type_id }}">
                                <div class="border rounded p-2 mx-auto secondary-bg">
                                    <div class="border-bottom p-2 mb-2 bg-light">
                                        <img class="img img-fluid" loading="lazy" width="200px"
                                            src="{{ asset('assets/img/' . $product->img) }}" alt="">
                                    </div>
                                    <p class="my-0 text-left fw-bold">
                                        Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}/day
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

            // Tampilkan semua Product pada awal halaman di-load
            filterProducts(null);
        });
    </script>

@endsection
