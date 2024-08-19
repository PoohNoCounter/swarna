@extends('layouts.client.app')

@section('title', 'Search Result')

@section('textHome', 'primary-bg text-white rounded')

@section('content')

    <div class="text-center py-5">
        <div class="container py-5">
            <div class="row">
                <h4 class="text-left py-1 fw-bold">SEARCH RESULT</h4>
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
                            <p class="my-0 text-left">{{ Str::limit($product->name ?? '-', 20) }} <br>
                                {{ Str::limit($product->type->category->name ?? '-', 12) }}
                                ({{ Str::limit($product->type->name ?? '-', 12) }})
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
