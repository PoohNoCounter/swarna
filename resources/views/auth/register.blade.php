@extends('layouts.client.app')

@section('title', 'Register')

@section('content')
    <div class="d-flex justify-content-center align-items-center pt-5 pb-3">
        <div class="card d-flex justify-content-center align-items-center mt-5 pb-2" style="width: 550px;">
            <div class="">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <img class="img img-fluid" width="200" src="{{ asset('assets/img/logo_full.png') }}" alt="">
            <p class="text-center font-weight-bold">Welcome to SWARNA</p>
            <div class="d-flex justify-content-center align-items-center mt-3 mx-3">
                <form action="{{ route('regist') }}" method="POST" class="row">
                    @csrf
                    <div class="form-group col-md-6 px-3">
                        <label for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" required autofocus
                            type="text" name="name" id="name" placeholder="Name...">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 px-3">
                        <label for="no_hp">Phone</label>
                        <input class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" required
                            type="text" name="no_hp" id="no_hp" placeholder="Phone">
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 px-3">
                        <label for="location">Adrress</label>
                        <input class="form-control @error('location') is-invalid @enderror" name="location" required
                            type="text" name="location" id="location" placeholder="Lampung...">
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 px-3">
                        <label for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" required autofocus
                            type="text" name="email" id="email" placeholder="name@gmail.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 px-3">
                        <label for="password">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" name="password" required
                            type="password" id="password" placeholder="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 px-3">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" required type="password" id="password_confirmation"
                            placeholder="password confirmation">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-block primary-bg mt-3">Register</button>
                </form>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <p class="text-center mt-3">Already have an account? <a class="text-decoration-none primary-color"
                        href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
@endsection
