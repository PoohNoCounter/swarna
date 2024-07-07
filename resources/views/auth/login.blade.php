@extends('layouts.client.app')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center align-items-center pt-5 pb-3">
        <div class="card d-flex justify-content-center align-items-center mt-5 pb-2" style="width: 300px;">
            <div class="">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <img class="img img-fluid" width="200" src="{{ asset('assets/img/logo_full.png') }}" alt="">
            <p class="text-center font-weight-bold">Welcome to SWARNA</p>
            <div class="mt-3 mx-3">
                <form action="{{ route('login') }}" method="POST" class="">
                    @csrf
                    <input class="form-control @error('email') is-invalid @enderror" name="email" required autofocus
                        type="text" name="email" id="email" placeholder="name@gmail.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <input class="form-control @error('password') is-invalid @enderror" name="password" required
                        type="password" id="password" placeholder="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-block aktif mt-3 primary-bg">Login</button>
                </form>
            </div>
            <div class="">
                <p class="text-center mt-3">Don't have an account? <a class="text-decoration-none primary-color"
                        href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
@endsection
