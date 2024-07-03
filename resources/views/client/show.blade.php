@extends('layouts.client.app')

@section('title', 'Produk')

@section('textProduct', 'primary-bg rounded')

@section('content')

    <div class="text-center py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-2 pt-3 header rounded">
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
                                <div class="border rounded p-2 mx-auto">
                                    <img class="img img-fluid" loading="lazy" width="100px"
                                        src="{{ asset('assets/img/' . $product->img) }}" alt="">
                                    <p class="my-0">{{ $product->name }}</p>
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

            // Tampilkan semua produk pada awal halaman di-load
            filterProducts(null);
        });
    </script>

@endsection
