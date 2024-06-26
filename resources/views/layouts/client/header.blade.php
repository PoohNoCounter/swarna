<?php
use Illuminate\Support\Facades\Auth;
?>

<header class="header px-3 mb-3 fixed-top border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                {{-- Kiri --}}
                <ul class="nav">
                    <li class="nav-item">
                        <img class="img img-fluid me-3" width="100" src="{{ asset('assets/img/logo_full.png') }}"
                            alt="Logo">
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('beranda') }}"
                            class="nav-link py-3 px-3 fw-bold fs-5 text-white @yield('textHome')">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('beranda') }}"
                            class="nav-link py-3 px-3 fw-bold fs-5 text-white @yield('textProduct')">{{ __('About') }}</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                {{-- Kanan --}}
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ route('booking') }}"
                            class="nav-link py-3 px-3 fw-bold fs-5 text-white @yield('textBooking')"><i
                                class="fa fa-shopping-cart primary-color"></i></a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item dropdown d-flex align-items-center">
                            <button class="btn dropdown-toggle text-white d-flex align-items-center" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"
                                style="color: #0093E9">
                                {{ Auth::user()->name }} <i class="fas fa-user-circle ms-2 fa-2x"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('login') }}" class="btn primary-bg ms-3">Masuk</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
