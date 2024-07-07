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
                    <li class="nav-header">MENU</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white @yield('activeDashboard')">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                DASHBOARD
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link text-white @yield('activeUser')">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                USER ACCOUNT
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.product.index') }}" class="nav-link text-white @yield('activeProduct')">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                PRODUCT
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.booking.index') }}" class="nav-link text-white @yield('activeBooking')">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                BOOKING
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.schedule.index') }}" class="nav-link text-white @yield('activeSchedule')">
                            <i class="nav-icon fas fa-calendar"></i>
                            <p>
                                EVENT SCHEDULE
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link text-white @yield('activeCategory')">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>
                                CATEGORY
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.type.index') }}" class="nav-link text-white @yield('activeType')">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                TYPE
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.inventory.index') }}" class="nav-link text-white @yield('activeInventory')">
                            <i class="nav-icon fas fa-warehouse"></i>
                            <p>
                                INVENTORY
                            </p>
                        </a>
                    </li>
                    <li class="nav-header mt-3">LOGOUT</li>
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
