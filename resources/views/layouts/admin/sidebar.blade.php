<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/img/logo_full.png') }}" width="200" alt="Logo" class="img img-fluid">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->

        @if (auth()->user()->role == 'admin')
            <nav class="">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-header">UTAMA</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white @yield('activeDashboard')">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                BERANDA
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link text-white @yield('activeUser')">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                AKUN PENGGUNA
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.product.index') }}" class="nav-link text-white @yield('activeProduct')">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                PRODUK
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.booking.index') }}" class="nav-link text-white @yield('activeBooking')">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                PEMESANAN
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.schedule.index') }}" class="nav-link text-white @yield('activeSchedule')">
                            <i class="nav-icon fas fa-calendar"></i>
                            <p>
                                JADWAL EVENT
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link text-white @yield('activeCategory')">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>
                                KATEGORI
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.type.index') }}" class="nav-link text-white @yield('activeType')">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                TIPE
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.inventory.index') }}" class="nav-link text-white @yield('activeInventory')">
                            <i class="nav-icon fas fa-warehouse"></i>
                            <p>
                                INVENTARIS
                            </p>
                        </a>
                    </li>
                    <li class="nav-header mt-3">KELUAR</li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                            @csrf
                        </form>
                        <a href="#" class="nav-link text-white @yield('')"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                LOGOUT
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        @endif

        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
