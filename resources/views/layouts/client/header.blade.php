<?php
use Illuminate\Support\Facades\Auth;
?>

<header class="header px-3 mb-3 fixed-top border-bottom">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light py-0">
            <a class="navbar-brand" href="#">
                <img class="img img-fluid me-3" width="100" src="{{ asset('assets/img/logo_full.png') }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('beranda') }}" style="color: black"
                            class="nav-link py-3 px-3 fw-bold fs-5 @yield('textHome')">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('schedule.index') }}" style="color: black"
                            class="nav-link py-3 px-3 fw-bold fs-5 @yield('textEvent')">{{ __('Event') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" style="color: black"
                            class="nav-link py-3 px-3 fw-bold fs-5 @yield('textProduct')">{{ __('Product') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('booking') }}" style="color: black"
                            class="nav-link py-3 px-3 fw-bold fs-5 @yield('textBooking')">{{ __('My Booking') }}</a>
                    </li>
                </ul>
                <form class="d-flex" action="{{ route('search') }}" method="GET">
                    <input type="text" class="form-control" name="query" placeholder="Search..."
                        value="{{ request('query') }}">
                    <button class="btn w-25 secondary-bg border" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('cart') }}" style="color: black"
                            class="nav-link py-3 px-3 fw-bold fs-5 @yield('textCart')">
                            <i class="fa fa-shopping-cart secondary-color"></i>
                        </a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item dropdown pt-2">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                style="color: black">
                                {{ Auth::user()->name }} <i class="fas fa-user-circle ms-2 fa-2x"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item py-3">
                            <a href="{{ route('login') }}" class="btn btn-dark secondary-bg ms-3">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
