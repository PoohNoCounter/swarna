@extends('layouts.client.app')

@section('title', 'Product')

@section('textProduct', 'primary-bg text-white rounded')

@section('content')

    <div class="text-center py-5">
        <div class="container py-5">
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
                            <p class="my-0 text-left">{{ $product->name }} - {{ $product->type->category->name }}
                                ({{ $product->type->name }})
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
