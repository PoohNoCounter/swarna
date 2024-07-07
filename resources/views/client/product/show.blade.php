@extends('layouts.client.app')

@section('title', 'Detail Product')

@section('textProduct', 'primary-bg text-white rounded')

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
                            <h5>Stock : {{ $product->quantity }}</h5>
                        </div>
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="rental_date">Rental Date</label>
                                    <input type="date" class="form-control" value="{{ old('rental_date') }}"
                                        name="rental_date" id="rental_date">
                                </div>
                                <div class="col-md-6">
                                    <label for="return_date">Return Date</label>
                                    <input type="date" class="form-control" value="{{ old('return_date') }}"
                                        name="return_date" id="return_date">
                                </div>
                            </div>
                            <div class="mb-3">
                                <h5>Quantity</h5>
                                <p>
                                    <span id="minusBtn" class="btn border">-</span>
                                    <input name="quantity" id="quantityInput" type="number" value="1"
                                        max="{{ $product->quantity }}" min="1"
                                        style="width: 50px; text-align: center;">
                                    <span id="plusBtn" class="btn border">+</span>
                                    <button type="submit" class="btn btn-danger primary-bg ms-3">
                                        <i class="fas fa-plus-circle me-2"></i>Add to cart
                                    </button>
                                </p>
                            </div>
                        </form>
                        <div class="mb-3">
                            <h5 class="fw-bold">Product Type</h5>
                            <p>{{ $product->type->category->name }} ({{ $product->type->name }})</p>
                        </div>
                        <div class="mb-3">
                            <h5 class="fw-bold">Description</h5>
                            <p>{{ $product->desc }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const minusBtn = document.getElementById("minusBtn");
            const plusBtn = document.getElementById("plusBtn");
            const quantityInput = document.getElementById("quantityInput");

            minusBtn.addEventListener("click", function() {
                let currentQuantity = parseInt(quantityInput.value, 10);
                if (currentQuantity > 1) {
                    quantityInput.value = currentQuantity - 1;
                }
            });

            plusBtn.addEventListener("click", function() {
                let currentQuantity = parseInt(quantityInput.value, 10);
                quantityInput.value = currentQuantity + 1;
            });
        });
    </script>

@endsection
